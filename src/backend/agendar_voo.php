<?php
include "access_control.php";
include "connection.php";

function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados solicitados no agendarVoo.vue
    $id_usuario = cleanInput($_POST['id_usuario']);
    $destino = cleanInput($_POST['destino']);
    $ida = cleanInput($_POST['ida']);
    $volta = cleanInput($_POST['volta']);
    $horario = cleanInput($_POST['horario']);
    $poltrona = cleanInput($_POST['poltrona']);
    $categoria = cleanInput($_POST['categoria']);

    // Inserir na tabela voos os dados
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

// Fechar db
$db_conn->close();
