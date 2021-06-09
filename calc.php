<?php
$daysn = $_POST['daysn']; //кол-во дней в месяце
$daysy = $_POST['daysy']; //кол-во дней в году
$summn1 = $_POST['depositAmount']; //сумма вклада
$depositTerm = $_POST['depositTerm']; //select
$select = $_POST['replenishment']; //radio
$summadd = $_POST['replenishmentAmount']; //сумма пополнения
$percent = 0.1; //процент
if ($select == 0) $summadd = 0;

$summn = $summn1 + ($summn1 + $summadd) * $daysn * ($percent / $daysy * $depositTerm);

$result = substr($summn, 0, -8);
$ans = ' ' . $result . " руб.";
echo json_encode($ans);
