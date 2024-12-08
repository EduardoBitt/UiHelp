<?php
$servername = "localhost";
$username = "u549325694_uihelp";        
$password = "@UiHelp2024admin";            
$dbname = "u549325694_uihelp";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>