<?php
use App\Entity\Task;

$task = new Task;

if(!empty($_POST)) {
    $id = intval($_POST['id'] ?? 0);
    $head = trim($_POST['head'] ?? '');
    $descn = trim($_POST['descn'] ?? '');
    $price = intval($_POST['price'] ?? 0);
    $customer = trim($_POST['customer'] ?? '');
    $executor = trim($_POST['executor'] ?? '');
    $category = trim($_POST['category'] ?? NULL);
    $status = trim($_POST['status'] ?? '');


    if($id > 0 && $head != '' && $status != '') {
        $result = $task->updateTask($id, $head, $descn, $price, $customer, $executor, $category, $status);

        if($result == true) {
            header("Location: " . url('admin_tasks'));
            exit;
        } else {
            redirect(url('admin_tasks_update'), 307);
        }
    }
}
header("Location: " . url('admin_tasks'));