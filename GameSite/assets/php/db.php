<?php
    $usuario = 'root';
    $pass = '';
    $database = 'gamesite';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $pass, $database);
    
    if($mysqli->error) {
        die("ERRO AO CONECTAR AO BANCO DE DADOS: " . $mysqli->error);
    }


?>