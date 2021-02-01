<?php
use App\Entity\User;

$user = new User;
$user->logoutUser();

header("Location: /", true, 301);