<?php
// Vérifie si le paramètre 'message' est absent dans l'URL
if (!isset($_GET['message']) || empty($_GET['message'])) {
    // Redirige automatiquement vers l'URL avec le message par défaut
    header("Location: ?message=Message%20par%20défaut");
    exit(); // Arrête l'exécution après la redirection
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Message</title>
</head>
<body>

        <li><a href="message.php?message=Bonjour%20le%20monde"> Afficher Bonjour le monde</a></li>
        <li><a href="message.php?message=Message%20important"> Afficher Message important</a></li>
        <li><a href="message.php?message=Bienvenue%20sur%20le%20site"> Afficher Bienvenue sur le site</a></li>

</body>
</html>


