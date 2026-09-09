<?php
    $erreur = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $prenom = trim($_POST['prenom']);
        $nom = trim($_POST['nom']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];


        if($prenom === ''){
            $erreur[] = "Le prénom est obligatoire.\n";
        }elseif(strlen($prenom) < 3){
            $erreur[] = "Le prénom doit faire au moins 3 caractères.\n";
        }

        if($nom === ''){
            $erreur[] = "Le nom est obligatoire.\n";
        }elseif(strlen($nom) < 2){
            $erreur[] = "Le nom doit faire au moins 2 caractères.\n";
        }

        if($email === ''){
            $erreur[] = "L'email est obligatoire.\n";
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $erreur[] = "L'email n'est pas valide.\n";
        }

        if(empty($password)){
            $erreur[] = "Le mot de passe est obligatoire.\n";
        }elseif(strlen($password) < 8){
            $erreur[] = "Le mot de passe doit faire au moins 8 caractères.\n";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <h2>S'inscrire</h2>
        <label for="prenom">Prénom</label>
        <input type="text" placeholder="Awa" name="prenom" id="prenom">
        <label for="nom">Nom</label>
        <input type="text" placeholder="Ndiaye" name="nom" id="nom">
        <label for="email">Email</label>
        <input type="email" placeholder="awandiaye@exemple.com" name="email" id="email">
        <label for="password">password</label>
        <input type="password" placeholder="Mot de passe" name="password" id="password">
        <label for="message">Message</label>
        <textarea name="message" id="message" placeholder="Votre message ..."></textarea>
        <div class="submit">
            <button type="submit">S'inscrire</button>
        </div>

        <?php if(!empty($erreur)): ?>
            <div class="messages error">
                <?php foreach($erreur as $e) : ?>
                    <p>
                        <?= $e ?>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php elseif($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
            <div class="messages success">
                <p>Inscription réussie !</p>
            </div>
        <?php endif; ?>

        <div class="links">
            <p>Vous avez déjà un compte ?</p>
            <a href="/connexion.php">Connexion</a>
        </div>
    </form>
</body>
</html>

