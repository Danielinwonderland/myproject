<?php 
use App\Entity\User;

$user = new User;

if(!empty($_POST)) {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $is_admin = isset($_POST['is_admin']) && $_POST['is_admin'] == 1 ? 1 : 0;
    $password = trim($_POST['password'] ?? '');
    $id = intval($_POST['id'] ?? 0);

    if($id >0 && $firstname != '' && $lastname != '' && $email != '') {
        $result = $user->updateUser($id, $firstname, $lastname, $email, $is_admin, $password);
        if($result == true) {
            redirect(url('admin_users'));
            exit;
        } else {
            redirect(url('admin_users_edit', ['id' => $user->id]), 307);
        }
    }
}
redirect(url('admin_users'));