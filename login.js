  // Sélection de l'élément du formulaire et ajout d'un écouteur d'événements sur la soumission
  document.querySelector('#mon-formulaire').addEventListener('submit', (event) => {
    event.preventDefault(); // Empêche le rechargement de la page

    const email = document.querySelector('#email').value.trim();
    const password = document.querySelector('#password').value.trim();

    if (email === '' || password === ''){
      alert('Veuillez remplir tous les champs obligatoires.');
      return;
    }

    // Récupération des données du formulaire
    const formData = new FormData(event.target);
  
    // Envoi de la requête
    fetch('login.action.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      // Redirection vers la page désirée
      window.location.replace("index.php");
    })
    .catch(error => {
      console.error(error);
    });
  });