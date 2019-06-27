<?php

    include '../utils.php';
    session_destroy();

    header( 'Location: ../index.php' );

?>