<?php
$tuntipalkka = $_POST["hourlywage"] ?? 0;
$tuntimaara = $_POST["hourly"] ?? 0;
$weekendbonus = $_POST["weekendbonus"] ?? 0;
$numberofweekends = $_POST["numberofweekends"] ?? 0;
$yhteispalkka = $tuntipalkka * $tuntimaara;
echo "Joint salary without weekend bonus: " . $yhteispalkka;
$yhteispalkka = $yhteispalkka + ($weekendbonus * $numberofweekends);
echo "<br>Joint pay with weekend bonus: " . $yhteispalkka;
?>