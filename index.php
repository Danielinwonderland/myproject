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

    'admin_users' => ['/admin/users/', '/admin/users/', 'admin/users/list'],
    'admin_users_add' => ['/admin/users/add/', '/admin/users/add/', 'admin/users/add'],
    'admin_users_edit' => ['/admin/users/edit/([0-9]+)/', '/admin/users/edit/<id>/', 'admin/users/edit'],
    'admin_users_delete' => ['/admin/users/delete/([0-9]+)/', '/admin/users/delete/<id>/', 'admin/users/delete'],

    'admin_categories' => ['/admin/categories/', '/admin/categories/', 'admin/categories/list'],
    'admin_categories_add' => ['/admin/categories/add/', '/admin/categories/add/', 'admin/categories/add'],
    'admin_categories_edit' => ['/admin/categories/edit/([0-9]+)/', '/admin/categories/edit/<id>/', 'admin/categories/edit'],
    'admin_categories_delete' => ['/admin/categories/delete/([0-9]+)/', '/admin/categories/delete/<id>/', 'admin/categories/delete'],

    'admin_tasks' => ['/admin/tasks/', '/admin/tasks/', 'admin/tasks/list'],
    'admin_tasks_add' => ['/admin/tasks/add/', '/admin/tasks/add/', 'admin/tasks/add'],
    'admin_tasks_edit' => ['/admin/tasks/edit/([0-9]+)/', '/admin/tasks/edit/<id>/', 'admin/tasks/edit'],
    'admin_tasks_delete' => ['/admin/tasks/delete/([0-9]+)/', '/admin/tasks/delete/<id>/', 'admin/tasks/delete'],
];

$arRoutesWithoutHeaderAndFooter = [
    'contacts_send_form',
    'admin_users_delete',
    'logout',
];


$arRoute = getRoute();


$page_file = $_SERVER['DOCUMENT_ROOT'] . '/pages/' . $arRoute['page'] . '.php';

if(!is_file($page_file)) {
    $page_file = $_SERVER['DOCUMENT_ROOT'] . '/pages/404.php';
}

$need_header_and_footer = !in_array($arRoute['name'], $arRoutesWithoutHeaderAndFooter);

$header_template = 'header';
$footer_template = 'footer';
if(strpos($arRoute['name'], 'admin_') === 0) {
    $header_template = 'admin/header';
    $footer_template = 'admin/footer';


}

if($need_header_and_footer) {
    printTemplateHtml($header_template);
}

include $page_file;

if($need_header_and_footer) {
    printTemplateHtml($footer_template);
}
