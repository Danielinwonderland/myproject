<?php
use App\Entity\Category;


$category = new Category;
$id = intval($arRoute['param']['id'] ?? 0);
$result = $category->deleteCategory($id);
header("Location: " . url('admin_categories'));
