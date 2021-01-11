<h1>Новости</h1>
<div class="row mb-3">
    <div class="col">
        <img src="https://fakeimg.pl/1152x250/?text=Banner" alt="" class="img-fluid w-100">
    </div>
</div>
<div class="row mb-3">
    <div class="col-8">
        <?php if(isset($arData['news']) && !empty($arData['news'])){?>
        <h3>Посдедние новости</h3>
        <?php
        printTemplateHtml('news/list', $arData['news']);
            }else{
                echo '<p>Новостей нет</p>';
            }
        ?>
    </div>
    <div class="col-4">
    <?php includeBlock('right_popular_news') ?>
    </div>
</div>
<?php
if(isset($arData['news']) && !empty($arData['news'])){
printTemplateHtml('news/index_photo_news', $arData['photo_news']);}?>
