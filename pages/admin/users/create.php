<?php
use App\Entity\User;

$user = new User;

if(!empty($_POST)) {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $is_admin = isset($_POST['is_admin']) && $_POST['is_admin'] == 1 ? 1 : 0;
    $password = trim($_POST['password'] ?? '');

    if($firstname != '' && $lastname != '' && $email != '' && $password != '') {
        $result = $user->addUser($firstname, $lastname, $email, $is_admin, $password);
        if($result == true) {
            redirect(url('admin_users'));
            exit;
        } else {
            redirect(url('admin_users_add'), 307);
        }
    }
}
redirect(url('admin_users'));