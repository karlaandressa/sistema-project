<?php
$hostname = "localhost";
$bancodedados = "meubd";
$usuario = "root";
$senha = "karl@20";

/* nova variavel   -     sintase pra criar noov objeto (parametros) */
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if($mysqli->connect_errno){
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    
    }
    else echo "Conectado!";