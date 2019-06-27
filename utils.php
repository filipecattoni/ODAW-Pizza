<?php

    session_start();
    $hash = "da39a3ee5e6b4b0d3255bfef95601890afd80709";

    // Função para construir o header
    //  0: Index
    //  1: Cardápio
    //  2: Pedidos
    //  3: Contato
    //  4: Configurações
    //  5: Login
    function loadHeader( $headId ){

        $headerClasses = array( "", "", "", "", "", "" );
        $headerClasses[ $headId ] = "selected";

        // Mudanças ocorridas no header de acordo com a permissão de usuário
        $config = '';
        if( isset( $_SESSION[ "permission" ] ) ){

            // Se estiver logado mostra botão de LogOut
            $login = '<form action="/session/logout.php">
                    Conectado como '.$_SESSION[ "email" ].'<br>
                    <button type="submit">LogOut</button>
                </form>';

            // Se for funcionário adiciona a sessão Configurações no cabeçalho
            if( $_SESSION["permission"] == 1 ){

                $config = '<a href="/func/confmenu.php" class="'.$headerClasses[4].'">Configurações</a>
                    <div class="separator"></div>';

            }

        }else{
            $login = '<a href="/login.php" class="'.$headerClasses[5].'">Login</a>';
        }

        echo '<header>
            <a href="/index.php" class="'.$headerClasses[0].'"><div id="logo">Pizzaria ABCD</div></a>
            <div class="separator"></div>
            <a href="#" class="'.$headerClasses[1].'">Cardápio</a>
            <div class="separator"></div>
            <a href="#" class="'.$headerClasses[2].'">Pedidos</a>
            <div class="separator"></div>
            <a href="#" class="'.$headerClasses[3].'">Contato</a>
            <div class="separator"></div>
            '.$config.$login.'
        </header>';

    }

    // Função para mostrar a mensagem de retorno de formulários
    // através da variável $_SESSION[ "msg" ]
    function printMsgForm(){

        if( isset( $_SESSION[ "msg" ] ) ){
            echo $_SESSION[ "msg" ];
            unset( $_SESSION[ "msg" ] );
        }

    }

?>