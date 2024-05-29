

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>API</title>
</head>
<body>
    
<?php

// Adresa API endpointu
$apiUrl = 'localhost/ludvablack/api/controller.php?action=getData';

try {
    // Vytvoření instance CURL
    $curl = curl_init();

    // Nastavení parametrů pro CURL požadavek
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Odeslání CURL požadavku
    $response = curl_exec($curl);

    // Kontrola, zda byla odpověď úspěšná
    if ($response === false) {
        throw new Exception('Nepodařilo se získat odpověď z API.');
    }

    // Dekódování JSON odpovědi na asociativní pole
    $data = json_decode($response, true);

    // Výpis dat z databáze
    if (!empty($data)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Typ</th><th>SPZ</th><th>Barva</th><th>dostupne</th></tr>";
        foreach ($data as $row) {
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['typ'] . "</td><td>" . $row['spz'] . "</td><td>" . $row['barva'] . "</td><td>" . $row['dostupne'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Žádná data nebyla nalezena.";
    }

    // Uzavření CURL spojení
    curl_close($curl);
} catch (Exception $e) {
    // Zpracování chyby
    echo "Chyba: " . $e->getMessage();
}

?>
</body>
</html>