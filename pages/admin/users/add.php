<?php
$arUser = [];

if(!empty($_POST)) {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $is_admin = isset($_POST['is_admin']) && $_POST['is_admin'] == 1 ? 1 : 0;
    $password = trim($_POST['password'] ?? '');

    if($firstname != '' && $lastname != '' && $email != '' && $password != '') {
        $result = addUser($firstname, $lastname, $email, $is_admin, $password);
        if($result == true) {
            header("Location: " . url('admin_users'));
            exit;
        } else {
            $arUser['firstname'] = $firstname;
            $arUser['lastname'] = $lastname;
            $arUser['email'] = $email;
            $arUser['is_admin'] = $is_admin;
        }
    }
}

printTemplateHtml('admin/users/add', $arUser);
