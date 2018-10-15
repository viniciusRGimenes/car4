<?php

    session_start();

    $login = $_POST ['login'];
    $senha = $_POST ['senha'];

    $db_server = "feriado_db_1";
    $db_user = "root";
    $db_password = "phprs";
    $db_database = "SERVER";

    function conectar(){
        $conn = new mysqli($this->db_server, $this->db_user, $this->db_password, $this->db_database);
        if($conn->connect_error){
            die("Erro ao tentar conectar no banco de dados: ". $conn->connect_error);
        }

        return $conn;
    }

    $result = mysqli_querry("SELECT * FROM 'USUARIO' WHERE 'NOME' = '$login' AND 'SENHA' = '$senha'");

    if(mysql_num_rows ($result) > 0) {
        $_SESSION ['login'] = $login;
        $_SESSION ['senha'] = $senha;
        header ('location:site.php');

    }else{
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header ('location:index.php');
    }


?>