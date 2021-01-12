<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/include/core/functions.php';

$routes = [
    'main_page' => ['/', '/', 'index'],
    'news_list' => ['/news/', '/news/', 'news/list'],
    'news_detail' => ['/news/([0-9a-z-]+)/([0-9a-z-]+)/', '/news/<id>/<vvv_id>/', 'news/detail'],
    'contacts' => ['/contacts/', '/contacts/', 'contacts'],
    'contacts_send_form' => ['/contacts/send/', '/contacts/send/', 'contacts/send'],
    'profile' => ['/profile/', '/profile/', 'profile'],
    'logout' => ['/profile/logout/', '/profile/logout/', 'profile/logout'],
    'auth' => ['/profile/auth/', '/profile/auth/', 'profile/auth'],
    'info' => ['/news/info/', '/news/info/', 'news/info'],
    'detail' => ['/news/detail/', '/news/detail/', 'news/detail'],
];

$arRoutesWithoutHeaderAndFooter = [
    'contacts_send_form',
    
];


$arRoute = getRoute();


$page_file = $_SERVER['DOCUMENT_ROOT'] . '/pages/' . $arRoute['page'] . '.php';

if(!is_file($page_file)) {
    $page_file = $_SERVER['DOCUMENT_ROOT'] . '/pages/404.php';
}

$need_header_and_footer = !in_array($arRoute['name'], $arRoutesWithoutHeaderAndFooter);

if($need_header_and_footer){
    printTemplateHtml('header');
}


include $page_file;

if($need_header_and_footer){
    printTemplateHtml('footer');
}

