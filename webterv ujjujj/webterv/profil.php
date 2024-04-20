<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Feldolgozzuk és tároljuk az új adatokat
    $new_name = $_POST["name"];
    $new_email = $_POST["email"];
    $new_address = $_POST["address"];

    // Ellenőrizzük, hogy minden mező ki van-e töltve
    if (!empty($new_name) && !empty($new_email) && !empty($new_address)) {
        // Betöltjük a meglévő adatokat a JSON fájlból
        $file = "data.json";
        $json_data = file_get_contents($file);
        $data = json_decode($json_data, true);

        // Frissítjük az adatokat az új adatokkal
        $data["name"] = $new_name;
        $data["email"] = $new_email;
        $data["address"] = $new_address;

        // Az adatokat visszaírjuk a JSON fájlba
        $updated_json_data = json_encode($data);
        file_put_contents($file, $updated_json_data);

        // Sikeres üzenet küldése
        echo "Az adatok sikeresen frissítve!";
    } else {
        // Ha valamelyik mező üres, akkor hibaüzenet küldése
        echo "Minden mező kitöltése kötelező!";
    }
} else {
    // Ha valamilyen másik módon próbálnak hozzáférni a fájlhoz, akkor hibaüzenet küldése
    echo "Hozzáférés megtagadva!";
}
?>
