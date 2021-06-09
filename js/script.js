/* Инициализация datepicker */
$(function () {
   var date = new Date();
   date.setDate(date.getDate());
   $("#datepicker").datepicker({
      minDate: date
   });
});

/* Локализация datepicker */
$.datepicker.regional['ru'] = {
   monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
   dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
   dateFormat: 'dd.mm.yy',
   firstDay: 1,
   isRTL: false,
   showMonthAfterYear: false,
   yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional["ru"]);

/* Валидация */
function myValidation() {
   if (dateValid() &&
      inputSum1Valid() &&
      inputSum2Valid())
      return true;
   else return false;
}

function dateValid() {
   var date = new Date();
   date_fl = document.getElementById('datepicker');
   str = date_fl.value;
   function TstDate() {
      str2 = str.split(".");
      if (str2.length != 3) {
         return false;
      }
      if (parseInt(str2[2], 10) < date.getFullYear()) {
         return false;
      }
      str2 = str2[2] + '-' + str2[1] + '-' + str2[0];
      if (new Date(str2) == 'Invalid Date') {
         return false;
      }
      return str;
   }
   var S = TstDate()
   if (S) {
      return true;
   }
   else {
      return false;
   }
}

function inputSum1Valid() {
   let input = document.getElementById('inp1');
   if (input.type == 'number' &&
      input.value >= 1000 && input.value <= 3000000 &&
      input.value != '' && input.value.indexOf('e') == -1) {
      return true;
   }
   else {
      return false;
   }
}

function inputSum2Valid() {
   let input = document.getElementById('inp2');
   if (input.type == 'number' &&
      input.value >= 1000 && input.value <= 3000000 &&
      input.value != '' && input.value.indexOf('e') == -1) {
      return true;
   }
   else {
      return false;
   }
}

// Вспомогательные функции
function displayRadio() {
   var el = document.getElementsByName('radio');
   for (i = 0; i < el.length; i++) {
      if (el[i].checked)
         return el[i].value;
   }
}

function daysOfYear(date) {
   let year = Number(date.substring(6, 10));
   return isLeapYear(year) ? 366 : 365;
}

function isLeapYear(year) {
   return (year % 400 == 0) || (year % 100 !== 0 && year % 4 == 0);
}

function daysInMonth(date) {
   let month = Number(date.substring(3, 5));
   let year = Number(date.substring(6, 10));
   let days;
   switch (month) {
      case 2:
         days = isLeapYear(year) ? 29 : 28;
         break;
      case 4: case 6: case 9: case 11:
         days = 30;
         break;
      default:
         days = 31;
   }
   return days;
}

/* Result */
function result() {
   let result = document.getElementById('result');
   let date = $("#datepicker").val();
   if (myValidation()) {
      console.log(date.substring(3, 5));
      let _daysn = daysInMonth(date);
      let _daysy = daysOfYear(date);
      let _depositAmount = $("#inp1").val();
      let _depositTerm = $("#select").val();
      let _replenishment = displayRadio();
      let _replenishmentAmount = $("#inp2").val();

      jQuery.ajax({
         dataType: "json",
         method: "POST",
         url: "calc.php",
         data: {
            daysn: _daysn, //dayMonth
            daysy: _daysy, //dayYear
            depositAmount: _depositAmount, //summn-1
            depositTerm: _depositTerm, //select
            replenishment: _replenishment, //radio
            replenishmentAmount: _replenishmentAmount //summadd
         }
      }).done(function (res) {
         result.innerHTML = "<span>Результат:</span>" + res;
      });
   }
   else {
      result.innerHTML = "<span>Результат:</span> Ошибка проверьте корректность данных.";
   }
}