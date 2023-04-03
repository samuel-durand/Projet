document.querySelector('#mon-formulaire-register').addEventListener('submit', function(e) {
    const nom = document.querySelector('#nom').value.trim();
    const prenom = document.querySelector('#prenom').value.trim();
    const email = document.querySelector('#email').value.trim();
    const password = document.querySelector('#password').value.trim();

    const errors = [];

    if (nom === '') {
      errors.push('Le nom est obligatoire.');
    }

    if (prenom === '') {
      errors.push('Le prénom est obligatoire.');
    }

    if (email === '') {
      errors.push('L\'adresse email est obligatoire.');
    }

    if (password === '') {
      errors.push('Le mot de passe est obligatoire.');
    }



    if (password !== confirm_password) {
      errors.push('Les mots de passe ne correspondent pas.');
    }

    if (errors.length > 0) {
      e.preventDefault();
      document.querySelector('#errors').innerHTML = errors.join('<br>');
    }
  });