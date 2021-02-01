<?php
use App\Entity\Category;

$category = new Category;

if(!empty($_POST)) {
    $name = trim($_POST['name'] ?? '');
    $parent_id = trim($_POST['parent_id'] ?? '');

    if($name != '') {
        $result = $category->addCategory($name, $parent_id);
        if($result == true) {
            redirect(url('admin_categories'));
            exit;
        } else {
            $arData['name'] = $name;
            $arData['parent_id'] = $parent_id;
        }
    }
}
