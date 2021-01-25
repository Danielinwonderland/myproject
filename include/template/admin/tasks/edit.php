<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Редактирование задание</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if(empty($arData)) { ?>
            <div class="alert alert-danger">
                <i class="icon fas fa-ban"></i> Задание не найдено!
            </div>
        <?php } else { ?>
            <div class="card">
                <!-- form start -->
                <form class="form-horizontal" method="post">
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
                                <input type="text" name="customer" value="<?php echo $arData['customer'] ?? ''; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Исполнитель</label>
                            <div class="col-sm-10">
                                <input type="text" name="executor" value="<?php echo $arData['executor'] ?? ''; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Категория</label>
                            <div class="col-sm-10">
                                <input type="text" name="category" value="<?php echo $arData['category'] ?? NULL; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Статус</label>
                            <div class="col-sm-10">
                                <input type="text" name="status" value="<?php echo $arData['status'] ?? ''; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?php echo url('admin_tasks'); ?>" class="btn btn-default">Отмена</a>
                        <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                    </div>
                    <!-- /.card-footer -->
                    <input type="hidden" name="id" value="<?php echo $arData['id']; ?>">
                </form>
            </div>
        <?php }  ?>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->