<?php include "include/template/header.php";
$arNews = getLastNews(10);
?>
<h1>Новости</h1>
<div class="row mb-3">
    <div class="col">
        <img src="https://fakeimg.pl/1152x250/?text=Banner" alt="" class="img-fluid w-100">
    </div>
</div>
<div class="row mb-3">
    <div class="col-8">
      <h3>Последние новости</h3>
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
<?php include "include/template/right_pop_news.php" ?>
</div>
<div class="row">
  <div class="col">
      <div class="card" style="width: 18rem;">
          <a href="#">
              <img src="https://fakeimg.pl/200x100/?retina=1&text=こんにちは&font=noto" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">
                <a href="#">Card title</a>
            </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
          <a href="#">
              <img src="https://fakeimg.pl/200x100/?retina=1&text=こんにちは&font=noto" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">
                <a href="#">Card title</a>
            </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
          <a href="#">
              <img src="https://fakeimg.pl/200x100/?retina=1&text=こんにちは&font=noto" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">
                <a href="#">Card title</a>
            </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
          <a href="#">
              <img src="https://fakeimg.pl/200x100/?retina=1&text=こんにちは&font=noto" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">
                <a href="#">Card title</a>
            </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    </div>
</div>
<?php include "include/template/footer.php" ?>