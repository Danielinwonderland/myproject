<?php

namespace App\Entity;

class Category {


    public static function getCategoriesList() {
        $link = db_connect();
        $query = "SELECT id, name, parent_id FROM categories ORDER BY id";
        $result = mysqli_query($link, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getCategoryItem(int $id) {
        $arUser = [];
        $link = db_connect();
        $query = "SELECT id, name, parent_id FROM categories WHERE id = " . $id;
        $result = mysqli_query($link, $query);
        if($row = mysqli_fetch_assoc($result)) {
            $arUser = $row;
        }
        return $arUser;
    }

    public function getCategoriesTree($parent_id = 0, $max_level = 0, $current_level = 0){
        $arCategories =  $this->getCategoriesList();
        $arResult = [];
        foreach($arCategories as $arCategory){
            if($parent_id == $arCategory['parent_id']){
                $arResult[$arCategory['id']] = $arCategory;
                if($max_level == 0 || $max_level > $current_level){
                    $arResult[$arCategory['id']]['children'] = $this->getCategoriesTree($arCategory['id'], $max_level, $current_level + 1);
                }else{
                    $arResult[$arCategory['id']]['children'] = [];
                }
            }
        }
        return $arResult;
    }

    function getCategoriesListStructured($parent_id = 0, $max_level = 0, $current_level = 0) {
        $arCategories = $this->getCategoriesList();
        $arResult = [];

        foreach ($arCategories as $arCategory) {
            if($parent_id == $arCategory['parent_id']) {
                $arResult[$arCategory['id']] = $arCategory;
                $arResult[$arCategory['id']]['level'] = $current_level;
                if($max_level == 0 || $max_level > $current_level) {
                    $arResult = array_merge($arResult, $this->getCategoriesListStructured($arCategory['id'], $max_level, $current_level + 1));
                }
            }
        }
        return $arResult;
    }

    public function updateCategory(int $id, string $name,  string $parent_id) {
        $link = db_connect();
        $query = "
            UPDATE categories
            SET
                name = '" . $name . "',
                parent_id = '" . ($parent_id > 0 ? $parent_id : "NULL") . "'
            WHERE id = {$id}
        ";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
    public function addCategory(string $name,  string $parent_id) {
        $link = db_connect();
        $query = "
            INSERT INTO categories
            SET
                name = '" . $name . "',
                parent_id = '" . ($parent_id > 0 ? $parent_id : 'NULL') . "'
        ";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
    public function deleteCategory(int $id) {
        $link = db_connect();
        $query = "DELETE FROM categories WHERE id = {$id}";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
}