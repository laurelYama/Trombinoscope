<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <title>Accès refusé</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .error-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f44336;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .error-container h1 {
            margin-top: 0;
        }

        .error-message {
            margin-bottom: 10px;
        }
    </style>
    </style>
<body>
    <h1>Accès refusé</h1>
    <?php
    // Vérifiez si un message d'erreur a été transmis
    if (isset($_GET['error'])) {
        $errorMessage = htmlspecialchars($_GET['error']);
        echo '<p>' . $errorMessage . '</p>';
    }
    ?>
    <p>reourner à la page <a href="../etudiant.php">etudiant</a> </p>
</body>
</html>
