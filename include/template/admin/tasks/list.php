<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Задания</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if(empty($arData)) { ?>
            <div class="alert alert-info">
                <i class="icon fas fa-info"></i> Заданий нет!
            </div>
            <div class="row mb-3 mt-n5">
                <div class="col col-sm-12">
                    <a href="<?php echo url('admin_tasks_add'); ?>" class="btn btn-info float-right"><i class="fas fa-user-plus"></i> добавить новую Задание</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="row mb-3 mt-n5">
                <div class="col col-sm-12">
                    <a href="<?php echo url('admin_tasks_add'); ?>" class="btn btn-info float-right"><i class="fas fa-user-plus"></i> добавить новую Задание</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Заказчик</th>
                            <th>Исполнитель</th>
                            <th>Дата создания</th>
                            <th>Категория</th>
                            <th>Статус</th>
                            <th>Просмотры</th>
                            <th style="width: 230px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($arData as $arData) { ?>
                        <tr>
                            <td><?php echo $arData['id']; ?></td>
                            <td><?php echo $arData['head']; ?></td>
                            <td><?php echo $arData['descn']; ?></td>
                            <td><?php echo $arData['price']; ?></td>
                            <td><?php echo $arData['customer']; ?></td>
                            <td><?php echo $arData['executor']; ?></td>
                            <td><?php echo $arData['datatime']; ?></td>
                            <td><?php echo $arData['category']; ?></td>
                            <td><?php echo $arData['status']; ?></td>
                            <td><?php echo $arData['views']; ?></td>
                            <td class="text-right">
                                <form method="post" action="<?php echo url('admin_tasks_delete', ['id' => $arData['id']]); ?>">
                                    <button class="btn btn-xs btn-danger float-right delete-btn" type="submit" data-toggle="modal" data-target="#modal-delete-user" data-message="Удалить Задание <b><?php echo $arData['head']; ?></b>(<?php echo $arData['id']; ?>)?"><i class="fas fa-trash"></i> удалить</button>
                                </form>
                                <a class="btn btn-default btn-xs float-right mr-2" href="<?php echo url('admin_tasks_edit', ['id' => $arData['id']]); ?>"><i class="fas fa-pencil-alt"></i> редактировать</a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="modal fade" id="modal-delete-user">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Удалить Задание?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="modal-delete-user-text">Удалить Задание?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary confirm_action">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php }  ?>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->