<?php
session_start();

// Définissez vos informations de connexion ici
$username = "Dilane";
$password = "1234";

if (isset($_POST['submit'])) {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION['logged_in'] = true;
        header("Location: accueil.html");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/styleconect.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (isset($error)) {
         echo "<p>$error</p>";
          } ?>
        <form method="post">
            <div class="user-box">
                <input type="text" name="username" id="username" required="">
                <label for="username">Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" required="">
                <label for="password" >Password</label>
            </div>

            <div class="button-form">
                
                <input type="submit" id="submit" name="submit" value="submit">
                <div id="register">
                    Don't have an account  ?
                    <a href="#">Register</a>
                </div>
            </div>
        </form>

    </div>
    
</body>
</html>