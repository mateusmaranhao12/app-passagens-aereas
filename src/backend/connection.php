<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_passagens_aereas";

// Cria uma conexão com o banco de dados
$db_conn = new mysqli($servername, $username, $password, $dbname);

if ($db_conn->connect_error) {
    die("DataBase Connection failed: " . $db_conn->connect_error);
}

?>