<?php
    include "assets/php/db.php";

    

    function headerImport(){
        include "assets/php/hUnLogged.php";
    }

    function generateHash($length = 32){
        return bin2hex(random_bytes($length));
    }
    
    $connect = new mysqli($host, $usuario, $pass, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
