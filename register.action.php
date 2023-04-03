<?php
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si les données ont été soumises
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) &&  isset($_POST['password']) ) {
  // Récupération des données soumises dans le formulaire
  $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES) ;
  $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
  $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

  // Recherche de l'utilisateur correspondant dans la base de données
  $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = :email');
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Vérification si l'utilisateur n'existe pas déjà
  if (!$user) {
    // Insertion de l'utilisateur dans la base de données
    $stmt = $pdo->prepare('INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)');
    $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

    // Affichage des informations de l'utilisateur inscrit
    $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($user);

    exit();
  } else {
    // Si l'utilisateur existe déjà, on affiche un message d'erreur
    echo 'L\'utilisateur existe déjà.';
  }
}
?>
