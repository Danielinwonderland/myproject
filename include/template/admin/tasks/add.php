<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Добавление задания</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo url('admin_tasks_create'); ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Заголовок задания</label>
                        <div class="col-sm-10">
                            <input type="text" name="head" value="<?php echo $arData['head'] ?? ''; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Описание</label>
                        <div class="col-sm-10">
                            <input type="text" name="descn" value="<?php echo $arData['descn'] ?? ''; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Цена</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" value="<?php echo $arData['price'] ?? ''; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Заказчик</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="customer" id="">
                                <option value=""></option>
                                <?php foreach ($arData['customers_list'] as $arCustomer){ ?>
                                <option value="<?php echo $arCustomer['customer_id']; ?>" <?php if(($arData['customer'] ?? '') == $arCustomer['customer_id']){?> selected="selected" <?php } ?>><?php
                                    echo '[', $arCustomer['user_id'], '] ', $arCustomer['firstname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Исполнитель</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="executor" id="">
                                <option value=""></option>
                                <?php foreach ($arData['executors_list'] as $arExecutor){ ?>
                                <option value="<?php echo $arExecutor['executor_id']; ?>" <?php if(($arData['executor'] ?? '') == $arExecutor['executor_id']){?> selected="selected" <?php } ?>><?php
                                    echo '[', $arExecutor['user_id'], '] ', $arExecutor['firstname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Категория</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category" id="">
                                <option value=""></option>
                                <?php foreach ($arData['categories_all'] as $arCategory){ ?>
                                <option value="<?php echo $arCategory['id']; ?>" <?php if(($arData['category'] ?? '') == $arCategory['id']){?> selected="selected" <?php } ?>><?php
                                    for($i = 0; $i < $arCategory['level']; $i++){
                                        echo '&#10146';
                                    } 
                                    echo '[', $arCategory['id'], '] ', $arCategory['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Статус</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control" id="">
                                <option value="new">Новая</option>
                                <option value="progress">Выполняется</option>
                                <option value="done">Завершена</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo url('admin_tasks'); ?>" class="btn btn-default">Отмена</a>
                    <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->