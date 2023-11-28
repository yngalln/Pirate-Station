<?php
    if(isset($_COOKIE['hash'])){
        include "assets/php/hLogged.php";
    }else{
        include "assets/php/hUnLogged.php";
    }

?>