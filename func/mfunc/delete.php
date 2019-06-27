<?php

    include '../../utils.php';

    $link = mysqli_connect("localhost", "root", "", "pizza");

    $query = "DELETE FROM funcionarios WHERE id=".$_GET['id'];
    $result = mysqli_query( $link, $query );
    
    if( $result ){
        $msg = "Funcionário deletado com sucesso";
    }else{
        $msg = "Erro ao deletar o funcionário";
    }

    // mensagem para ser usada pela função printMsgForm() do utils.php
    $_SESSION[ "msg" ] = $msg;

    header( 'Location: menu.php' );

?>
