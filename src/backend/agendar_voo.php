<?php
include "access_control.php";
include "connection.php";

function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the Vue.js application
    $id_usuario = cleanInput($_POST['id_usuario']);
    $destino = cleanInput($_POST['destino']);
    $ida = cleanInput($_POST['ida']);
    $volta = cleanInput($_POST['volta']);
    $horario = cleanInput($_POST['horario']);
    $poltrona = cleanInput($_POST['poltrona']);
    $categoria = cleanInput($_POST['categoria']);

    // Perform the SQL query to insert data into the database
    $sql = "INSERT INTO voos (id_usuario, destino, ida, volta, horario, poltrona, categoria) VALUES ('$id_usuario', '$destino', '$ida', '$volta', '$horario', '$poltrona', '$categoria')";

    //verificar se houve erro ou sucesso ao cadastrar o usuario 
    if ($db_conn->query($sql) === TRUE) {
        $res = array('status' => 'sucesso', 'mensagem' => 'Passagem agendada com sucesso!');
        echo json_encode($res);
    } else {
        $res = array('status' => 'erro', 'mensagem' => 'Erro ao agendar vôo!' . $db_conn->error);
        echo json_encode($res);
    }
} else {
    echo json_encode(array("error" => "Método não permitido."));
}

// Close the database connection
$db_conn->close();
