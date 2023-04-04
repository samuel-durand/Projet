<?php 

include('config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <title>inscription</title>
</head>
<body>

<h1>inscription</h1>
<main>
<form id="mon-formulaire-register" method="POST">
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" >

  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom" >

  <label for="email">Adresse email :</label>
  <input type="email" id="email" name="email" >

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password"  >



  <button type="submit">S'inscrire</button>
  
  <div id="errors" style="color: red;"></div>

  <script>
    document.querySelector('#mon-formulaire-register').addEventListener('submit', function(e) {
      const nom = document.querySelector('#nom').value.trim();
      const prenom = document.querySelector('#prenom').value.trim();

      const errors = [];

      if (nom === '') {
        errors.push('Le nom est obligatoire.');
      }

      if (prenom === '') {
        errors.push('Le prénom est obligatoire.');
      }

      if (errors.length > 0) {
        e.preventDefault();
        document.querySelector('#errors').innerHTML = errors.join('<br>');
      }
    });
  </script>
</form>





<script>
// Sélection de l'élément du formulaire et ajout d'un écouteur d'événements sur la soumission
document.querySelector('#mon-formulaire-register').addEventListener('submit', (event) => {
  event.preventDefault(); // Empêche le rechargement de la page

  // Vérification que tous les champs obligatoires sont remplis
  const nom = document.querySelector('#nom').value.trim();
  const prenom = document.querySelector('#prenom').value.trim();
  const email = document.querySelector('#email').value.trim();
  const password = document.querySelector('#password').value.trim();

  if (nom === '' || prenom === '' || email === '' || password === '') {
    alert('Veuillez remplir tous les champs obligatoires.');
    return;
  }

  // Récupération des données du formulaire
  const formData = new FormData(event.target);

  // Envoi de la requête
  fetch('register.action.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    // Redirection vers la page désirée
    window.location.href = 'login.php';
  })
  .catch(error => {
    console.error(error);
  });
});


</script>


    
</body>
</html>