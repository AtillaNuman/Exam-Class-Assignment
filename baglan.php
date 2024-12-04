<?php 
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "ALRLd3QIPZboxNRY";
$database = "ogrenciler";

try {
    // PDO ile bağlantı oluşturma
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

?>
