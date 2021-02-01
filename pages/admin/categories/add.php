<?php
use App\Entity\Category;
$category = new Category;
$arData = [];

if(!empty($_POST)){
    $arData = $_POST;
}

$arData['categories_all'] = $category->getCategoriesListStructured();

printTemplateHtml('admin/categories/add', $arData);
