<?php

$error = false;
$profile = url('profile');
if(isAuthorizedUser()) {
    header("Location: $profile", true, 301);
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(loginUser($email, $password)) {
    header("Location: $profile", true, 301);
    exit;
} elseif(isset($_POST['email'])) {
    $error = 'Неверная почта или пароль';
}

printTemplateHtml('profile/auth');


if($error) {
   echo '<div class="alert alert-danger mt-3" role="alert">' . $error . '</div>';
};
?>
