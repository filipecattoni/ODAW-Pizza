<?php

    include '../../utils.php';

    $link = mysqli_connect("localhost", "root", "", "pizza");
    $name    = $_POST["txtName"];
    $desc   = $_POST["txtDesc"];
    $price   = $_POST["txtPrice"];
    $id = $_POST["hidid"];

    $query = "UPDATE produtos
                SET nome='".$name. "',
                descricao='".$desc. "',
                preco=" .$price." 
                WHERE id =".$id;
    $result = mysqli_query( $link, $query );
    
    if( $result ){
        $msg = "Produto alterado com sucesso";
    }else{
        $msg = "Erro ao alterar o produto";
    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    $_SESSION[ "msg" ] = $msg;

    header( 'Location: menu.php' );

?>
