<?php
if (isset($_COOKIE['hash'])) {
    $hash = $_COOKIE['hash'];
    $query = mysqli_query($connect, "SELECT * FROM users WHERE hash = '$hash'");

    if ($query && mysqli_num_rows($query) > 0) {
        $arr = mysqli_fetch_array($query);
?>
        <header>
            <img src="assets\img\logobanner.jpeg">
            <a href="index.php">Início</a>
            <a style="float: right" href="logout.php">Sair</a>
            <a style="float: right" href="config.php">Configurações</a>
            <a style="float: right" href="profile.php"><?php echo $arr['name'] ?> </a>
            <img style="float: right" src="<?php echo $arr['icon'] ?>">
        </header>
<?php
    } else {
        
    }
} else {

}
?>
