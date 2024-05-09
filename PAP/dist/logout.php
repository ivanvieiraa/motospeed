<?php
    session_start();                // iniciar sessao
    session_unset();                // apagar variaveis de sessao
    session_destroy();              // destruir sessao
    header('refresh:0;URL=index.php');