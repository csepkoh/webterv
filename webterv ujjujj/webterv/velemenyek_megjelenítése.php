<?php
// Beolvasás és megjelenítés a JSON fájlból
$velemenyek_json = file_get_contents('velemenyek.json');
$velemenyek = json_decode($velemenyek_json, true);

foreach ($velemenyek as $velemeny) {
    echo "<p><strong>" . $velemeny['nev'] . " véleménye:</strong> " . $velemeny['velemeny'] . "</p>";
}
?>
