<?php

    $sn = "localhost";
    $n = "root";
    $s = "";
    $db = "psico_db";

    $conn = new mysqli($sn, $n, $s, $db);
    if($conn -> connect_error) {
        die("erro de conexao" . $conn->connect_error);
    }
    else {
        echo "conectado com sucesso";
    }
?>