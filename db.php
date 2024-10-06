<?php
$host = 'localhost';
$dbname = 'blog';
$username = 'root';
$password = '';

// Creare connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controlla connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
