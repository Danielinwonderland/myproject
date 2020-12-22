<?php include "include/header.php";
  $arNews = [
    [
      'title' => 'У Канаді знайшли мумію вовченяти віком приблизно 57 тисяч років',
      'url' => '#',
      'datetime' => '19:41',
    ],
    [
      'title' => 'В Україні планують продавати антибіотики лише за рецептом ㅡ Степанов',
      'url' => '#',
      'datetime' => '18:11',
    ],
    [
      'title' => 'Журналіст Бутусов стане позаштатним радником міністра оборони. Він працюватиме на громадських засадах',
      'url' => '#',
      'datetime' => '15:36',
    ],
    [
      'title' => 'У Ватикані назвали використання вакцини від COVID-19 «морально прийнятним»',
      'url' => '#',
      'datetime' => '14:42',
    ],
    [
      'title' => 'У Таїланді чоловік урятував життя слоненяті, яке збив мотоцикл. Він зробив йому непрямий масаж серця',
      'url' => '#',
      'datetime' => '22:41',
    ],
    [
      'title' => 'Facebook вимкнув автоматичне сканування особистих листувань у країнах ЄС. Ця функція виявляла насилля над дітьми',
      'url' => '#',
      'datetime' => '17:41',
    ],
    [
      'title' => 'САП просить суд взяти під варту заступника голови Офісу президента Татарова',
      'url' => '#',
      'datetime' => '18:33',
    ],
    [
      'title' => 'МОЗ представило план щеплення українців від коронавірусу. Кому і коли держава обіцяє вакцини?',
      'url' => '#',
      'datetime' => '19:45',
    ],
  ];
?>
          <h1>Список новостей</h1>
          <div class="row mb-3">
              <div class="col-8 ">
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

              <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
        
            
            </div>
            <?php include "include/right_pop_news.php" ?>
          </div>
          <?php include "include/footer.php" ?>