<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'model.php';

// Nastavení údajů pro připojení k databázi
$server = "localhost"; // Název hostitele databáze
$uzivatel = "root"; // Název uzivatele databáze
$heslo = ""; // Heslo k databazi
$databaze = "autopark2"; // Nazev databaze

// Vytvoření instance modelu
$model = new DatabaseModel($server, $uzivatel, $heslo, $databaze);

// Pokud je požadavek typu GET a parametr "action" je "getData"
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getData') {
    // Získání dat z modelu
    $data = $model->getData();
    // Vrácení dat jako JSON odpověď
    echo json_encode($data);
// Ulozeni JSON do souboru
$filename = 'data.json';
$result = file_put_contents($filename, json_encode($data));


}
?>
