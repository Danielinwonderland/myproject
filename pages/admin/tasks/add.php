<?php
$arData = [];

if(!empty($_POST)) {
    $head = trim($_POST['head'] ?? '');
    $descn = trim($_POST['descn'] ?? '');
    $price = intval($_POST['price'] ?? 0);
    $customer = trim($_POST['customer'] ?? '');
    $executor = trim($_POST['executor'] ?? '');
    $category = trim($_POST['category'] ?? NULL);
    $status = trim($_POST['status'] ?? '');

    if($head != '') {
        $result = addTask($head, $descn, $price, $customer, $executor, $category, $status);
        if($result == true) {
            header("Location: " . url('admin_tasks'));
            exit;
        } else {
            $arItem['head'] = $head;
            $arItem['descn'] = $descn;
            $arItem['price'] = $price;
            $arItem['customer'] = $customer;
            $arItem['executor'] = $executor;
            $arItem['category'] = $category;
            $arItem['status'] = $status;
        }
    }
}

printTemplateHtml('admin/tasks/add', $arData);