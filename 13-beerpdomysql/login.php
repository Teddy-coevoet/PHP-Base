<<<<<<< HEAD
<?php 


require('partials/header.php'); ?>

<h1>Se connecter</h1>

<?php

    if(!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérifie que l'email existe en BDD
        $query = $db->prepare('SELECT * FROM user WHERE email= :email');
        $query->bindvalue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(); // Retourne un tableau avec le user ou false

        $error= null;

        // Si le user n'existe pas en BDD
        if (!$user) {
            $error = 'le login n\'existe pas.';
                }

        // Est-ce que le mot de passe est correct ?
        if($user && !password_verify($password, $user['password'])) {
            $error = 'le mot de passe n\'est pas correct';
        }

        // Si le user existe, on peut se connecter
        if (!$error) {
            // Ajout de l'utilisateur dans la sessions
            unset($user['password']);// on enmève le mdp "Hashé par sécurité"
            $_SESSION['email'] = $email;
        }
        var_dump($error);

    }

?>

<div class="row ml-5">
<form method="POST" action="">
=======
<?php
require('partials/header.php'); ?>

<div class="container pt-5">
    <h1>Se connecter</h1>

    <?php
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Vérifie que l'email existe en BDD
            $query = $db->prepare('SELECT * FROM user WHERE email = :email');
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch(); // Retourne un tableau avec le user ou false

            $error = null;
            
            // Si le user n'existe pas en BDD
            if (!$user) {
                $error = 'Le login n\'existe pas.';
            }

            // Est-ce que le mot de passe est correct ?
            if ($user && !password_verify($password, $user['password'])) {
                $error = 'Le mot de passe n\'est pas correct';
            }

            // Si le user existe, on peut se connecter
            if (!$error) {
                // Ajout de l'utilisateur dans la session
                unset($user['password']); // On enlève le mot de passe "hashé" par sécurité
                $_SESSION['user'] = $user;
            }

            var_dump($error);
        }
    ?>

    <form method="POST">
>>>>>>> upstream/master
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
<<<<<<< HEAD
        <button class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<?php require('partials/footer.php');
=======
        <button class="btn btn-primary">Se connecter</button>
    </form>
</div>

<?php require('partials/footer.php');
>>>>>>> upstream/master
