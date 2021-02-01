<?php
use App\Entity\Category;


$category = new Category;

$arData = $category->getCategoryItem($arRoute['param']['id'] ?? 0);
$arData['categories_all'] = $category->getCategoriesListStructured();
printTemplateHtml('admin/categories/edit', $arData);