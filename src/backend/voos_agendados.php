<?php

include "access_control.php";
include "connection.php";

if (!function_exists('cleanInput')) {
    function cleanInput($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id_usuario = cleanInput($_GET['id_usuario']);

    // Consultar voos no banco de dados
    $consulta_voos = "SELECT * FROM voos WHERE id_usuario = '$id_usuario'";
    $resultado_voos = $db_conn->query($consulta_voos);

    // Array dos voos
    $voos = array();

    while ($row = $resultado_voos->fetch_assoc()) {

        $voos[] = array(
            'destino' => $row['destino'],
            'ida' => $row['ida'],
            'volta' => $row['volta'],
            'horario' => $row['horario'],
            'poltrona' => $row['poltrona'],
            'categoria' => $row['categoria'],
        );
    }

    // Exibir os voos como JSON
    header('Content-Type: application/json');
    echo json_encode($voos);

}

// Fechar db
$db_conn->close();

?>