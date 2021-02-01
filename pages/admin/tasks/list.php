<?php
use App\Entity\Task;
use App\Entity\Category;
$category = new Category;
$arData['categories_all'] = $category->getCategoriesListStructured();
$arData['tasks'] = Task::getTasksList();
$arData['customers_list'] = getCustomersList();
$arData['executors_list'] = getExecutorsList();
printTemplateHtml('admin/tasks/list', $arData);
