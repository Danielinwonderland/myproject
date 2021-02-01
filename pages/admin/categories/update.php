<?php
use App\Entity\Category;

$category = new Category;

if(!empty($_POST)) {
    $name = trim($_POST['name'] ?? '');
    $parent_id = trim($_POST['parent_id'] ?? '');
    $id = intval($_POST['id'] ?? 0);

    if($id > 0 && $name != '') {
        $result =  $category->updateCategory($id, $name, $parent_id);
        if($result == true) {
            redirect(url('admin_categories'));
        } else {
            $arData['name'] = $name;
            $arData['lastname'] = $parent_id;
        }
    }
}