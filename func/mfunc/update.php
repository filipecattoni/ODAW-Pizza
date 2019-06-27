<?php

    include '../../utils.php';

    $link = mysqli_connect("localhost", "root", "", "pizza");
    $pass    = md5( $hash.$_POST["txtPass"] );
    $user   = $_POST["txtUser"];
    $id = $_POST["hidid"];

    $query = "UPDATE funcionarios
                SET email='".$user. "',
                senha='" .$pass."' 
                WHERE id =".$id;
    $result = mysqli_query( $link, $query );
    
    if( $result ){
        $msg = "Funcionário alterado com sucesso";
    }else{
        $msg = "Erro ao alterar o funcionário";
    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    $_SESSION[ "msg" ] = $msg;

    header( 'Location: menu.php' );

?>
