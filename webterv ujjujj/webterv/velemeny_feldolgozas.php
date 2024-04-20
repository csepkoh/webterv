<?php
// Beolvasás és dekódolás a JSON fájlból
$velemenyek_json = file_get_contents('velemenyek.json');
$velemenyek = json_decode($velemenyek_json, true);

// Új vélemény hozzáadása a tömbhöz
$uj_velemeny = array(
    'nev' => $_POST['nev'],
    'velemeny' => $_POST['velemeny']
);
$velemenyek[] = $uj_velemeny;

// JSON fájl frissítése
file_put_contents('velemenyek.json', json_encode($velemenyek));

// Visszatérés az eredeti oldalra
header('Location: velemenyek.html');
?>
