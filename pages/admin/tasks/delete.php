<?php
$id = intval($arRoute['param']['id'] ?? 0);
$result = deleteTask($id);
header("Location: " . url('admin_tasks'));
