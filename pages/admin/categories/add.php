<?php
$arData = [];

if(!empty($_POST)) {
    $name = trim($_POST['name'] ?? '');
    $parent_id = trim($_POST['parent_id'] ?? '');

    if($name != '') {
        $result = addCategory($name, $parent_id);
        if($result == true) {
            header("Location: " . url('admin_categories'));
            exit;
        } else {
            $arData['name'] = $name;
            $arData['parent_id'] = $parent_id;
        }
    }
}

printTemplateHtml('admin/categories/add', $arData);
