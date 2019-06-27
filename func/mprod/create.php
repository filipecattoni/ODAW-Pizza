<?php

    include '../../utils.php';

    $link = mysqli_connect("localhost", "root", "", "pizza");
    $name    = $_POST["txtName"];
    $desc   = $_POST["txtDesc"];
    $price   = $_POST["txtPrice"];

    $query = "INSERT INTO produtos ( nome, descricao, preco )
        VALUES ( '".$name."', '".$desc."', ".$price." )";
    $result = mysqli_query( $link, $query );
    
    if( $result ){
        $msg = "Produto cadastrado com sucesso";
    }else{
        $msg = "Erro no cadastro do produto";
    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    $_SESSION[ "msg" ] = $msg;

    header( 'Location: menu.php' );

?>
