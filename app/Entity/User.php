<?php

namespace App\Entity;

class User {
    public function loginUser($email, $password): bool {

        $result = false;
    
        $link = db_connect();
    
        $query = "SELECT id, firstname, email, is_admin, password FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($res)) {
            $hash = $row['password'];
            if(password_verify($password, $hash)) {
                $_SESSION = [
                    'user' => [
                        'id' => $row['id'],
                        'name' => $row['firstname'],
                        'email' => $row['email'],
                        'is_admin' => $row['is_admin']
                    ],
                ];
                $result = true;
            }
        }
    
        return $result;
    
    }

    public function logoutUser() {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    public static function getUserList() {
        $link = db_connect();
        $query = "SELECT id, firstname, lastname, email, password, is_admin FROM users ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getUserItem(int $id) {
        $arUser = [];
        $link = db_connect();
        $query = "SELECT id, firstname, lastname, email, password, is_admin FROM users WHERE id = " . $id;
        $result = mysqli_query($link, $query);
        if($row = mysqli_fetch_assoc($result)) {
            $arUser = $row;
        }
        return $arUser;
    }

    public function updateUser(int $id, string $firstname,  string $lastname, string $email, int $is_admin, string $password = '') {
        $link = db_connect();
        $query = "
            UPDATE users
            SET
                firstname = '" . $firstname . "',
                lastname = '" . $lastname . "',
                email = '" . $email . "',
                is_admin = " . $is_admin . "
            WHERE id = {$id}
        ";
        $result = mysqli_query($link, $query);
        if($password != '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password = '" . $hash . "' WHERE id = {$id}";
            mysqli_query($link, $query);
        }
        return (bool)$result;
    }
    
    public function addUser(string $firstname,  string $lastname, string $email, int $is_admin, string $password) {
        $link = db_connect();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "
            INSERT INTO users
            SET
                firstname = '" . $firstname . "',
                lastname = '" . $lastname . "',
                email = '" . $email . "',
                is_admin = " . $is_admin . ",
                password = '" . $hash . "'
        ";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }

    public function deleteUser(int $id) {
        $link = db_connect();
        $query = "DELETE FROM users WHERE id = {$id}";
        $result = mysqli_query($link, $query);
        return (bool)$result;
    }
}