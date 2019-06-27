<?php

    include '../utils.php';

    $link = mysqli_connect("localhost", "root", "", "pizza");

    $pass    = md5( $hash.$_POST["txtPass"] );
    $email   = $_POST["txtEmail"];
    $tel     = $_POST["txtTel"];
    $rua     = $_POST["txtRua"];
    $num     = $_POST["txtNum"];
    $bairro  = $_POST["txtBairro"];
    $comp    = $_POST["txtComp"];
    $address = $rua." ".$num." ".$bairro." ".$comp;

    $query = "INSERT INTO clientes ( email, senha, telefone, endereco )
        VALUES ( '".$email."', '".$pass."', '".$tel."', '".$address."' )";
    $result = mysqli_query( $link, $query );
    
    if( $result ){
        $msg = "Cliente cadastrado com sucesso!!";
    }else{
        $msg = "Erro no cadastro do cliente!!";
    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    $_SESSION[ "msg" ] = $msg;

    header( 'Location: ../register.php' );

?>
