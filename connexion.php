<?php 
    // require 'mysql.php'; 
    // $pdo = connexion();
?>

<?php
    $erreur = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = trim($_POST['email']);
        $password = $_POST['password'];

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
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Se connecter</h2>
        <label for="email">Email</label>
        <input type="text" placeholder="awadiouf@exemple.com" name="email" id="email" value="<?= htmlspecialchars($email ?? '')?>">
        <div class="messages error">
            <?= $erreur['email'] ?? '' ?>
        </div>
        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="password" id="password">
        <?php if(!empty($erreur['password'])): ?>
            <div class="messages error">
            <?= $erreur['password'] ?? '' ?>
            </div>
        <?php endif; ?>
        <div>
            <button type="submit">Se connecter</button>
        </div>

        <?php if(empty($erreur)): ?>
            <div class="messages success">
                <p>Connexion réussie !</p>
            </div>
        <?php endif; ?>

        <div class="links">
            <p>Vous n'avez pas un compte ?</p>
            <a href="/index.php">Créer un compte</a>
        </div>
    </form>
</body>
</html>