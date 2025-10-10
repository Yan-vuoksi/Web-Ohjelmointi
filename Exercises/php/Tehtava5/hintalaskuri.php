<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$tuotteen_name = "E-scooter";
$hinta_pcs = 349.90;
$kappalemaara = 2;
$alennusprosentti = 15;
$valisumma = $hinta_pcs * $kappalemaara;
$alennus_eur = $valisumma * ($alennusprosentti / 100);
$loppusumma = $valisumma - $alennus_eur;
echo"<h1>Tuotteen hintatiedot</h1>\n";
echo "Tuote: $tuotteen_name\n";
echo "Kappalehinta: " . number_format($hinta_pcs, 2, ',', '.') . " € <br>";
echo "Määrä: $kappalemaara kpl\n";
echo"<hr>\n";
echo "Välisumma: " . number_format($valisumma, 2, ',', '.') . " € <br>";
echo "Alennus: " . number_format($alennus_eur, 2, ',', '.') . " € <br>";
echo"<hr>\n";
echo "<strong>Lopullinen hinta</strong>: " . number_format($loppusumma, 2, ',', '.') . " €\n";
?>
</body>
</html>
