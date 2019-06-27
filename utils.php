<?php

    // Função para construir o header
    //  0: Index
    //  1: Cardápio
    //  2: Pedidos
    //  3: Contato
    //  4: Configurações
    function loadHeader( $headId ){

        $headerClasses = array( "", "", "", "", "" );
        $headerClasses[ $headId ] = "selected";

        echo '<header>
            <a href="index.php" class="'.$headerClasses[0].'"><div id="logo">Pizzaria ABCD</div></a>
            <div class="separator"></div>
            <a href="#">Cardápio</a>
            <div class="separator"></div>
            <a href="#">Pedidos</a>
            <div class="separator"></div>
            <a href="#">Contato</a>
            <div class="separator"></div>
            <a href="Login.php" class="'.$headerClasses[4].'">Login</a>
        </header>';

    }

?>