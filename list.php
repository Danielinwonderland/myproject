<?php include "include/template/header.php";
  $xml = 'http://k.img.com.ua/rss/ru/all_news2.0.xml';
  $strXML = file_get_contents($xml);
  $objXML = simplexml_load_string($strXML, 'SimpleXMLElement', LIBXML_NOCDATA);
  $jsonXml = json_encode($objXML);
  $arXml = json_decode($jsonXml, true);

  foreach($arXml['channel']['item'] as $item){
    $arNews[] =     [
      'title' => $item['title'],
      'id' => $item['guid'],
      'url' => 'detail.php?id=' . $item['guid'],
      'datetime' => date('H:m', strtotime($item['pubDate'])),
    ];
  }
  
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
            <?php include "include/template/right_pop_news.php" ?>
          </div>
          <?php include "include/template/footer.php" ?>