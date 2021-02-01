<?php

function getNews($source, $limit) : array {

    $arNews = [];

    $xml = $source;
    $strXML = file_get_contents($xml);
    $objXML = simplexml_load_string($strXML, 'SimpleXMLElement', LIBXML_NOCDATA);
    $jsonXML = json_encode($objXML);
    $arXML = json_decode($jsonXML, true);

    foreach ($arXML['channel']['item'] as $item) {

        preg_match("/src=\"(.+?)\"/", $item['image'], $matches);
        $image = $matches[1] ?? '';

        $arNews[] = [
            'id' => $item['guid'],
            'datetime' => date('H:i', strtotime($item['pubDate'])),
            'title' => $item['title'],
            'image' => $image,
            'url' => '/detail.php?id=' . $item['guid'],
            'description' => strip_tags($item['description']),
        ];
    }

    $arNews = array_slice($arNews, 0, $limit);

    return $arNews;
}

function getLastNews($limit = 20) : array {
    return getNews('http://k.img.com.ua/rss/ru/all_news2.0.xml', $limit);
}

function getPopularNews($limit = 10) : array {
    return getNews('http://k.img.com.ua/rss/ru/good_news.xml', $limit);
}

function getPhotoNews($limit = 6) : array {
    return getNews('http://k.img.com.ua/rss/ru/mainbyday.xml', $limit);
}

function isAuthorizedUser(): bool {
    return isset($_SESSION['user']['id']) && $_SESSION['user']['id'] > 0;
}
function getRoute($path = ''): array {

    global $routes;

    if($path == '') {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    $arRoute = [
        'name' => '',
        'page' => '404',
        'param' => [],
    ];

    foreach ($routes as $name => $arValue) {
        $pattern = '/^' . str_replace('/', '\/', $arValue[0]) . '$/';
        if(preg_match($pattern, $path, $matches)) {

            $arRoute['name'] = $name;
            $arRoute['page'] = $arValue[2];

            if(count($matches) > 1) {
                preg_match_all("/<(.+?)>/", $arValue[1], $matches2);

                foreach ($matches2[1] as $key => $param_name) {
                    $arRoute['param'][$param_name] = $matches[$key + 1];
                }
            }

        }
    }

    return $arRoute;

}

function url($name, $params = []) {
    global $routes;
    $url = $routes[$name][1] ?? '';
    if(!empty($params)) {
            $arReplace = [];
            foreach ($params as $key => $value) {
                    $arReplace['<' . $key . '>'] = $value;
            }
            if(!empty($arReplace)) {
                $url = str_replace(array_keys($arReplace), $arReplace, $url);
            }   
    }
    return $url;
}

function redirect($url, $status = 301) {
    header("Location: " . $url, true, $status);
    exit;
}

function printTemplateHtml($template, $arData = []) {
    $template_path = $_SERVER['DOCUMENT_ROOT'] . '/include/template/' . $template . '.php';
    if(is_file($template_path)) {
        include $template_path;
    }
}

function includeBlock($block) {
    $block_path = $_SERVER['DOCUMENT_ROOT'] . '/include/blocks/' . $block . '.php';
    if(is_file($block_path)) {
        include $block_path;
    }
}

function db_connect() {
    $link = mysqli_connect('localhost', 'root', '', 'freelance');

    if (mysqli_connect_errno()) {
        echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        exit;
    }
    mysqli_set_charset ( $link , 'utf8' );
    return $link;
}

function isAdminRoute(){
    global $arRoute;
    return strpos($arRoute['name'], 'admin_') === 0;
}

function isAdminUser(){
    $result = false;
    if(isAuthorizedUser()){
        if($_SESSION['user']['is_admin'] == 1){
            $result = true;
        }
    }
    return $result;
}

function getCustomersList(){
    $link = db_connect();
    $query = "SELECT u.id as user_id, c.id as customer_id, firstname, lastname FROM users as u JOIN customer as c ON u.id = c.user_id";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getExecutorsList(){
    $link = db_connect();
    $query = "SELECT u.id as user_id, e.id as executor_id, firstname, lastname FROM users as u JOIN executor as e ON u.id = e.user_id";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
