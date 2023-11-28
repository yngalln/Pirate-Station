<?php
    include "assets/php/import.php";
    
    if(isset($_POST['logar'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($query) > 0){
            $arr = mysqli_fetch_array($query);
            if($pass == $arr['pass']){
                setcookie("hash", $arr['hash']);
                header("location: ./");
            }else{
                $error = "Senha errada!";
            }
        }else{
            $error = "Email não encontrado!";
        }
    }else{
        $error = "";
        $success = "";
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Pirate Station</title>
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
            <h1>Logar:</h1><br>
            <form method="POST">
                <h4>Email:</h4><input minlength="8" type="email" name="email" required><br>
                <h4>Senha:</h4><input minlength="8" type="password" name="pass" required><br><br>
                <input type="submit" name="logar" Value="Logar">
            </form>
        </div>
        <br>
        <?php echo $error; ?>
        <br>
        Ainda não possui uma conta? <a href="register.php">Clique Aqui</a> para se registrar!
        <center>
    </body>
    </html>
