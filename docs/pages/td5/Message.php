<?php
// Vérifier si un message est passé dans l'URL via la méthode GET
$message = isset($_GET['message']) ? $_GET['message'] : 'Message par défaut';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Message</title>
</head>
<body>

        <li><a href="message.php?message=Bonjour%20le%20monde">Afficher "Bonjour le monde"</a></li>
        <li><a href="message.php?message=Message%20important">Afficher "Message important"</a></li>
        <li><a href="message.php?message=Bienvenue%20sur%20le%20site">Afficher "Bienvenue sur le site"</a></li>

</body>
</html>
