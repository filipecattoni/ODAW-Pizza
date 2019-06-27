<?php

    include '../utils.php';

    // variavel para controlar se redireciona para login (erro no login)
    // ou index (sucesso no login)
    $redirect = '../index.php';
    $link     = mysqli_connect("localhost", "root", "", "pizza");
    $pass     = md5( $hash.$_POST["txtPass"] );
    $email    = $_POST["txtEmail"];

    // verificando se é cliente
    $query = "SELECT *
                FROM clientes
            WHERE email = '".$email."'
                AND senha = '".$pass."'";
    $result = mysqli_query( $link, $query );

    if( $result->num_rows > 0 ){
        
        $_SESSION[ "email" ] = $email;
        $_SESSION[ "permission" ] = 0;
    
    }else{
        
        $query = "SELECT *
                    FROM funcionarios
                WHERE email = '".$email."'
                    AND senha = '".$pass."'";
        $result = mysqli_query( $link, $query );

        if( $result->num_rows > 0 ){
            $_SESSION[ "email" ] = $email;
            $_SESSION[ "permission" ] = 1;
        }

    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    if( !isset( $_SESSION[ "email" ] ) ){
        $_SESSION[ "msg" ] = "E-mail/Senha incorretos.";
        $redirect = '../login.php';
    }

    header( 'Location: '.$redirect );

?>
