<?php
function calculateShippingCost($toimitustapa) {
    switch ($toimitustapa) {
        case "nouto":
            return 0.00;
        case "postipaketti":
            return 6.90;
        case "kotiinkuljetus":
            return 12.50;
        default:
            return -1; // Invalid shipping method
    }
}
$valittu_tapa="postipaketti"; // Example input, replace with actual input retrieval method
$hinta = calculateShippingCost($valittu_tapa);
if ($hinta != -1) {
    echo "Valittu toimitustapa: $valittu_tapa<br>";
    echo "Toimituskulut: " . number_format($hinta, 2, ',', '.') . " €<br>";
} else {
    echo "Virheellinen toimitustapa.";
}
?>