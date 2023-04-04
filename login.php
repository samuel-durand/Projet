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
    <title>connexion</title>

</head>
<body>
    <h1>Connexion</h1>
    <main>
    <form method="post" id="mon-formulaire">
    <label for="email">email :</label>
    <input type="email" name="email" id="email">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">

    <button type="submit">se connecter</button>
    <div id="errors" style="color: red;"></div>
    <script>
        document.querySelector('#mon-formulaire').addEventListener('submit',function(e){
            const email = document.querySelector('#email').value.trim();
            const password = document.querySelector('#password').value.trim();

            const errors = [];

            if (email === ''){
                errors.push('email est obligatoire.');
            }

            if (password === '') {
                errors.push('le mot de pass est obligatoire.');
            }

            if(errors.length >0){
                e.preventDefault();
                document.querySelector('#errors').innerHTML = errors.join('<br>');
            }
        });
    </script>
</form>

</main>
<script src="login.js"></script>




</body>
</html>