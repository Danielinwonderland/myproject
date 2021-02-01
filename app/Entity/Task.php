<?php

namespace App\Entity;

class Task {
    public static function getTasksList() {
        $link = db_connect();
        $query = "SELECT id, head, descn, price, customer, executor, datatime, category, status, views FROM tasks ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    public function getTasksItem(int $id) {
        $arUser = [];
        $link = db_connect();
        $query = "SELECT id, head, descn, price, customer, executor, datatime, category, status, views FROM tasks WHERE id = " . $id;
        $result = mysqli_query($link, $query);
        if($row = mysqli_fetch_assoc($result)) {
            $arUser = $row;
        }
        return $arUser;
    }
    
    public function updateTask(int $id, string $head,  string $descn, int $price, string $customer, string $executor, string $category, string $status ) {
        $link = db_connect();
        $query = "
            UPDATE tasks
            SET
                head = '" . $head . "',
                descn = '" . $descn . "',
                price = '" . $price . "',
                customer = " . $customer . ",
                executor = " . $executor . ",
                category = '" . $category . "',
                status = '" . $status . "'
            WHERE id = {$id}
        ";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
    
    
    
    public function addTask(string $head,  string $descn, int $price, string $customer, string $executor, string $category, string $status) {
        $link = db_connect();
        $query = "
            INSERT INTO tasks
            SET
                head = '" . $head . "',
                descn = '" . $descn . "',
                price = '" . $price . "',
                customer = " . $customer . ",
                executor = " . $executor . ",
                category = '" . $category . "',
                status = '" . $status . "'
        ";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
    
    public function deleteTask(int $id) {
        $link = db_connect();
        $query = "DELETE FROM tasks WHERE id = {$id}";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
    
}