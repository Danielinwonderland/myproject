<?php
use App\Entity\Task;
use App\Entity\Category;

$task = new Task;
$category = new Category;

$arData = [];

if(!empty($_POST)){
    $arData = $_POST;
}

$arData= $task->getTasksItem($arRoute['param']['id'] ?? 0);
$arData['customers_list'] = getCustomersList();
$arData['executors_list'] = getExecutorsList();
$arData['categories_all'] = $category->getCategoriesListStructured();

printTemplateHtml('admin/tasks/add', $arData);