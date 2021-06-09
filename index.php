<!DOCTYPE HTML>
<html lang="en">

<head>
   <!-- Метатеги -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- DatePicker -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- Css -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/calc.ico">
   <title>Calculator</title>
</head>

<body>
   <div class="wrapper">
      <header class="header">
         <div class="container">
            <!-- ================= -->
            <div class="header-top">
               <div class="header-inner">
                  <a href="#"><img src="images/logo.png" alt="Логотип"></a>
                  <div class="contacts">
                     <a href="tel:+78001005005" class="number">8-800-100-5005</a>
                     <a href="tel:+73452522000" class="number">+7(3452)522-000</a>
                  </div>
               </div>
            </div>
            <!-- ================= -->
            <div class="header-center">
               <div class="btn-group">
                  <a href='#'>Кредитные карты</a>
                  <a href='#' class="link active">Вклады</a>
                  <a href='#'>Дебетовая карта</a>
                  <a href='#'>Страхование</a>
                  <a href='#'>Друзья</a>
                  <a href='#'>Интернет-банк</a>
               </div>
            </div>
            <!-- ================= -->
            <div class="header-bottom">
               <ul class="breadcrumb">
                  <li><a href="#">Главная</a></li>
                  <li><a href="#">Вклады</a></li>
                  <li>Калькулятор</li>
               </ul>
            </div>
         </div>
      </header>

      <main>
         <div class="container">
            <div class="main-title">
               Калькулятор
            </div>
            <div class="main-inner" id="form">
               <div class="row row-date">
                  <label for="datepicker" class="label">Дата оформления вклада</label>
                  <div class="field">
                     <input type="text" class="form-control" id="datepicker" placeholder="дд.мм.гггг" value="дд.мм.гггг" autocomplete="off">
                  </div>
               </div>
               <!-- ===================== -->
               <div class="row row-sum">
                  <div class="col-sum">
                     <label for="inp1" class="label">Сумма вклада</label>
                     <div class="field">
                        <input type="number" id="inp1" class="form-control" min="1000" max="3000000" value="10000" placeholder="123456789" autocomplete="off" required>
                     </div>
                  </div>
                  <div class="col-fill">
                     <input type="range" id="range1" class="form-control" min="1000" max="3000000" value="1500000" step="1000" oninput="inp1.value = range1.value" onchange="inp1.value = range1.value">
                     <div class="value">
                        <div class="left">1 тыс. руб.</div>
                        <div class="right">3000000</div>
                     </div>
                  </div>
               </div>
               <!-- ===================== -->
               <div class="row row-select">
                  <label for="select" class="label">Срок вклада</label>
                  <div class="field">
                     <select class="form-control" id="select">
                        <option selected value="1">1 год</option>
                        <option value="2">2 года</option>
                        <option value="3">3 года</option>
                        <option value="4">4 года</option>
                        <option value="5">5 лет</option>
                     </select>
                  </div>
               </div>
               <!-- ===================== -->
               <div class="row row-radio">
                  <label for="radio" class="label">Пополнение вклада</label>
                  <div class="field">
                     <label class="label label-check-no"><input class="radio" type="radio" checked name="radio" value="0">Нет</label>
                     <label class="label label-check-yes"><input class="radio" type="radio" name="radio" value="1">Да</label>
                  </div>
               </div>
               <!-- ===================== -->
               <div class="row row-sum row-sum-last">
                  <div class="col-sum">
                     <label for="inp2" class="label">Сумма пополнения вклада</label>
                     <div class="field">
                        <input type="number" id="inp2" class="form-control" min="1000" max="3000000" value="10000" placeholder="123456789" autocomplete="off">
                     </div>
                  </div>
                  <div class="col-fill">
                     <input type="range" id="range2" class="form-control" min="1000" max="3000000" value="1500000" step="1000" oninput="inp2.value = range2.value" onchange="inp2.value = range2.value">
                     <div class="value">
                        <div class="left">1 тыс. руб.</div>
                        <div class="right">3000000</div>
                     </div>
                  </div>
               </div>
               <!-- ===================== -->
               <div class="row row-result">
                  <button type="submit" class="btn" id="submit" onclick="result();">Рассчитать</button>
                  <div class="result" id="result">
                  </div>
               </div>
            </div>
         </div>
      </main>

      <footer class="footer">
         <div class="container">
            <div class="footer-inner">
               <ul class="nav">
                  <li class="nav-item">
                     <a href="#" class="nav-link">Кредитные карты</a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">Вклады</a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">Дебетовая карта</a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">Страхование</a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">Друзья</a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">Интернет-банк</a>
                  </li>
               </ul>
            </div>
         </div>
      </footer>
   </div>

   <!-- ============================================================= -->
   <!-- JQuerry -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

   <!-- DatePicker -->
   <script src="js/jquery-ui.min.js"></script>
   <!-- MyScript -->
   <script src="js/script.js"></script>
</body>