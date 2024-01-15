<?php

    include "access_control.php";

    include "connection.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $local_origem = $_POST['local_origem'];

        $sql = "INSERT INTO usuarios 
            (nome, sobrenome, email, senha, local_origem) 
            VALUES 
            ('$nome', '$sobrenome', '$email', '$senha', '$local_origem')";

        //verificar se houve erro ou sucesso ao cadastrar o usuario 
        if ($db_conn->query($sql) === TRUE) {
            $res = array('status' => 'sucesso', 'mensagem' => 'Usuário cadastrado com sucesso!');
            echo json_encode($res);
        } else {
            $res = array('status' => 'erro', 'mensagem' => 'Erro ao cadastrar usuário!' . $db_conn->error);
            echo json_encode($res);
        }

    }

    $db_conn->close();

?>