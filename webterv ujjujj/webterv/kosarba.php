<?php
session_start(); // Munkamenet indítása, ha még nem lett elindítva

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kosarba'])) {
    $termek_nev = $_POST['termek_nev'];
    $termek_ar = $_POST['termek_ar'];

    // Kosárba helyezés: hozzáadás a munkamenethez (session)
    $_SESSION['kosar'][$termek_nev] = $termek_ar;

    // Sikeres visszajelzés
    echo "A termék sikeresen hozzá lett adva a kosárhoz.";
} else {
    // Hiba esetén visszajelzés
    echo "Nincs elegendő adat a kosárba helyezéshez.";
}
?>
