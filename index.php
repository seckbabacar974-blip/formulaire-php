<?php 
    // require 'mysql.php'; 
    // $pdo = connexion();
?>

<?php
    $erreur = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $prenom = trim($_POST['prenom']);
        $nom = trim($_POST['nom']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];


        if($prenom === ''){
            $erreur['prenom'] = "Le prénom est obligatoire.\n";
        }elseif(strlen($prenom) < 3){
            $erreur['prenom'] = "Le prénom doit faire au moins 3 caractères.\n";
        }

        if($nom === ''){
            $erreur['nom'] = "Le nom est obligatoire.\n";
        }elseif(strlen($nom) < 2){
            $erreur['nom'] = "Le nom doit faire au moins 2 caractères.\n";
        }

        if($email === ''){
            $erreur['email'] = "L'email est obligatoire.\n";
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $erreur['email'] = "L'email n'est pas valide.\n";
        }

        if(empty($password)){
            $erreur['password'] = "Le mot de passe est obligatoire.\n";
        }elseif(strlen($password) < 8){
            $erreur['password'] = "Le mot de passe doit faire au moins 8 caractères.\n";
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
        <div class="nomcomplet">
            <div class="content">
                <label for="prenom">Prénom</label>
                <input type="text" placeholder="Awa" name="prenom" id="prenom" value="<?php htmlspecialchars($prenom ?? '')?>">
                <div class="messages error">
                    <?= $erreur['prenom'] ?? '' ?>
                </div>
            </div>
            <div class="content">
                <label for="nom">Nom</label>
                <input type="text" placeholder="Ndiaye" name="nom" id="nom" value="<?php htmlspecialchars($nom ?? '')?>">
                <div class="messages error">
                    <?= $erreur['nom'] ?? '' ?>
                </div>
            </div>
        </div>
        <label for="email">Email</label>
        <input type="text" placeholder="awandiaye@exemple.com" name="email" id="email" value="<?php htmlspecialchars($email ?? '')?>">
        <div class="messages error">
            <?= $erreur['email'] ?? '' ?>
        </div>
        <label for="password">password</label>
        <input type="password" placeholder="Mot de passe" name="password" id="password">
        <div class="messages error">
            <?= $erreur['password'] ?? '' ?>
        </div>
        <div class="submit">
            <button type="submit">S'inscrire</button>
        </div>

        <?php if(empty($erreur)): ?>
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

