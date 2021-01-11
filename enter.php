<?

$routes = [
    'main_page' => ['/', '/', 'index'],
    'news_list' => ['/news/', '/news/', 'news/index'],
    'news_detail' => ['/news/([0-9a-z-]+)/([0-9a-z-]+)', '/news/<id>/<vvv_id>/', 'news/detail'],
];

function getRoute($path = ''){

    global $routes;

   if($path == ''){
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
   }

   $arRoute = [
       'name' => '',
       'page' => '404',
       'param' => [],
   ];

   foreach ($routes as $name => $arValue){
    
   }

   return $arRoute;

}

var_dump(getRoute());