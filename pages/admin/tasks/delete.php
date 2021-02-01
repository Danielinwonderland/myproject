<?php
use App\Entity\Task;

$task = new Task;
$id = intval($arRoute['param']['id'] ?? 0);
$result = $task->deleteTask($id);
header("Location: " . url('admin_tasks'));
