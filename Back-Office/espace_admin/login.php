<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="icon" type="../../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link rel="stylesheet" href="../../css/login.css">
    <title>Connexion</title>
</head>
<body>
    
    <form action="login_processuss.php" method="POST">
    <h2>Connexion</h2>
    <?php
    if (isset($_GET['error'])) {
        $errorMessage = htmlspecialchars($_GET['error']);
        if ($errorMessage === 'email') {
            echo '<p style="color:red;">Email incorrect</p>';
        } elseif ($errorMessage === 'password') {
            echo '<p style="color:red;">Mot de passe incorrect</p>';
        } else {
            echo '<p style="color:red;">Email ou mot de passe incorrect</p>';
        }
    }
    ?>
        
        <input type="email" id="email" name="email" placeholder="email" required>
        <br>
        <input type="password" id="password" name="password" placeholder="mot de passe" required>
        <br>
        <button type="submit" name="login">Se connecter</button>
    </form>
    <div>
</body>
</html>
