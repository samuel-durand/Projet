<?php

include('config.php');
session_start();
if (isset($_SESSION['user_id'])) {
    // Récupération des informations de l'utilisateur à partir de la base de données
    $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE id = :id');
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupération du prénom de l'utilisateur
    $prenom = $user['prenom'];

} else {
    // Redirection vers la page de connexion
    header('Location: login.php');
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
<?php     echo 'Bienvenue, ' . $prenom . ' !';
?>

</body>
</html>