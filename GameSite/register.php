<?php
include "assets/php/import.php";

if (isset($_POST['registrar'])) {
    $nome = isset($_POST['nome']) ? mysqli_real_escape_string($connect, $_POST['nome']) : "";
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connect, $_POST['email']) : "";
    $pass = isset($_POST['pass']) ? mysqli_real_escape_string($connect, $_POST['pass']) : "";
    $cpass = isset($_POST['cpass']) ? mysqli_real_escape_string($connect, $_POST['cpass']) : "";

    if ($pass == $cpass) {
        $query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($query) < 1) {
            $hash = generateHash();
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($connect, "INSERT INTO `users` (`hash`, `name`, `pass`, `icon`, `email`, `wallet`)
                                    VALUES ('$hash', '$nome', '$hashedPass', 'assets/img/defaulticon.png', '$email', '0')");
            $success = "Sucesso ao criar sua conta!";
            $error = "";
        } else {
            $error = "Email já cadastrado!";
            $success = "";
        }
    } else {
        $error = "Senha não confirmada!";
        $success = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Pirate Station</title>
    <link rel="stylesheet" type="text/css" media="screen" href="assets\css\main.css"/>
    <script src="assets\js\main.js"></script>
</head>
<body>
    <header>
        <a href="index.php"><- Voltar</a>
    </header>
    <br><br><br>
    <center><img src="assets\img\logobanner.jpeg" width="45%"><br><br>
    <div class="panel" style="width: 74%; height:250px">
        <h1>Registrar:</h1><br>
        <form method="POST">
            <div style="float: left; padding-left: 300px">
            <h4>Nome:</h4><input type="name" minlength="5" name="name" required><br>
            <h4>Email:</h4><input type="email" minlength="8" name="email" required><br>
            </div>
            <div style="float: right; padding-right: 300px">
            <h4>Senha:</h4><input type="password" minlength="8" name="pass" required><br>
            <h4>Confirmar Senha:</h4><input type="password" minlength="8" name="cpass" required><br>
            </div>
            <div style="padding-top: 125px"></div>
            <input type="submit" name="registrar" Value="Registrar">
    </div>
    <br>
    Já possui uma conta? <a href="login.php">Clique Aqui</a> para se logar!
    <center>
</body>
</html>