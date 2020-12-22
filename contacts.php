<?php include "include/header.php" ?>
          <h1>Контакты</h1>
          <div class="row mb-3">
              <div class="col-8">
                <p><strong><em>«</em></strong><em>На животі лежати, на боці лежати, на спині не лежати. Дихаємо хвилин сорок і робимо перерву. І весь час записуєте ситуацію, ведете щоденник. Ваше завдання — зробити так, щоб вона добу пролежала без кисню. Ось після цього ви повинні набрати мене і сказати: “Ми вже, і ми можемо його повернути”»</em>, — консультує когось телефоном Катерина Ножевникова, невисока жінка у чорній куртці.</p>
                <h4>Наши контакты</h4>
                <ul class=" mb-3">
                  <li>Адрес: ул. Пушкина дом Колотушкина</li>
                  <li>Телефон: +3805553535</li>
                  <li>Email: exemple@gmail.com</li>
                </ul>
                <h4>Связаться с нами</h4>
                <form action="">
                  <div class="mb-3">
                    <label for="name" class="form-label">Ваше имя</label>
                    <input type="text" class="form-control" id="name" placeholder="Ivan Ivanov">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Электронный адрес</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="phone" class="form-control" id="phone" placeholder="+380998887744">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Ваше сообщение</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                </form>
              </div>

              <?php include "include/right_pop_news.php" ?>
          </div>
          <?php include "include/footer.php" ?>