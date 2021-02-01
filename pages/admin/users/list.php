<?php
use App\Entity\User;


$arUsers = User::getUserList();
printTemplateHtml('admin/users/list', $arUsers);
