<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
        // Ellenőrizzük, hogy a fájl egy kép-e
        $file_type = mime_content_type($_FILES["profile_image"]["tmp_name"]);
        if (strpos($file_type, "imag/") !== false) {
            // A fájl áthelyezése a célhelyre
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                // Frissítjük a profilkép elérési útvonalát az adatokban
                $file = "data.json";
                $json_data = file_get_contents($file);
                $data = json_decode($json_data, true);
                $data["profile_image"] = $target_file;
                $updated_json_data = json_encode($data);
                file_put_contents($file, $updated_json_data);
                echo "A profilkép sikeresen feltöltve és frissítve!";
            } else {
                echo "Hiba történt a fájl feltöltése közben.";
            }
        } else {
            echo "Csak képfájlok tölthetőek fel.";
        }
    } else {
        echo "Nem sikerült feltölteni a fájlt.";
    }
}
?>
