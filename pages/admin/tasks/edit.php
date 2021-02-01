<?php
use App\Entity\Task;
use App\Entity\Category;

$task = new Task;
$category = new Category;

if(!empty($_POST)){
    $arData = $_POST;
}

$arItem= $task->getTasksItem($arRoute['param']['id'] ?? 0);
$arItem['customers_list'] = getCustomersList();
$arItem['executors_list'] = getExecutorsList();
$arItem['categories_all'] = $category->getCategoriesListStructured();

printTemplateHtml('admin/tasks/edit', $arItem);