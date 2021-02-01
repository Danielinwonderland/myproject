<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Редактирование категории</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if(empty($arData)) { ?>
            <div class="alert alert-danger">
                <i class="icon fas fa-ban"></i> Категория не найдена!
            </div>
        <?php } else { ?>
            <div class="card">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo url('admin_categories_update'); ?>">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Название категории</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="<?php echo $arData['name'] ?? ''; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ID родителя</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="parent_id" id="">
                                    <option value="">Верхний уровень</option>
                                    <?php foreach ($arData['categories_all'] as $arCategory){ ?>
                                    <option value="<?php echo $arCategory['id']; ?>" <?php if(($arData['parent_id'] ?? '') == $arCategory['id']){?> selected="selected" <?php } ?>><?php
                                        for($i = 0; $i < $arCategory['level']; $i++){
                                            echo '&#10146';
                                        } 
                                        echo '[', $arCategory['id'], '] ', $arCategory['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?php echo url('admin_categories'); ?>" class="btn btn-default">Отмена</a>
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