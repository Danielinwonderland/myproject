<? getPopularNews($limit=10) ?>

<div class="col-4">
  <ul class="mb-3 list-group">
    <?foreach($arNews as $news) {?>
      <li class="list-group-item">
        <span class="bg-warning "><?echo $news['datetime']?></span>
        <a href="<?echo $news['url']?>">
          <?echo $news['title']?>
        </a>
      </li>
    <?}?>
  </ul>
</div>