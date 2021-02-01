<?php
use App\Entity\User;

$user = new User;
$arUser = $user->getUserItem($arRoute['param']['id'] ?? 0);

printTemplateHtml('admin/users/edit', $arUser);


