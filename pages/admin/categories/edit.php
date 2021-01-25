<?php
$arUser = getCategoryItem($arRoute['param']['id'] ?? 0);

if(!empty($_POST)) {
    $name = trim($_POST['firstname'] ?? '');
    $parent_id = trim($_POST['parent_id'] ?? '');
    $id = intval($_POST['id'] ?? 0);

    if($id == $arUser['id'] && $name != '') {
        $result = updateCategory($id, $name, $parent_id);
        if($result == true) {
            header("Location: " . url('admin_categories'));
            exit;
        } else {
            $arUser['name'] = $name;
            $arUser['lastname'] = $parent_id;
        }
    }
}

printTemplateHtml('admin/categories/edit', $arUser);