<?php


$host = 'localhost';
$dbname = 'userqs';
$username = 'root';
$password = '';
try {
    //code...
     $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     ]);
} catch (\Exception $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}


?>