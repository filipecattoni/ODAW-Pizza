<?php

    include '../../utils.php';

    $link = mysqli_connect("localhost", "root", "", "pizza");
    $pass    = md5( $hash.$_POST["txtPass"] );
    $user   = $_POST["txtUser"];

    $query = "INSERT INTO funcionarios ( email, senha )
        VALUES ( '".$user."', '".$pass."' )";
    $result = mysqli_query( $link, $query );
    
    if( $result ){
        $msg = "Funcionário cadastrado com sucesso";
    }else{
        $msg = "Erro no cadastro do funcionário";
    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    $_SESSION[ "msg" ] = $msg;

    header( 'Location: menu.php' );

?>
