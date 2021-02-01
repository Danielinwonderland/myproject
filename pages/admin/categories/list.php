<?php
use App\Entity\Category;
$category = new Category;
$arData = $category->getCategoriesListStructured();
printTemplateHtml('admin/categories/list', $arData);
