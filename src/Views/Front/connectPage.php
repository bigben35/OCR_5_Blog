<?php
$title = "Page de Connexion";
$description = "Page de Connexion";
ob_start();
?>

<section id="connectUser">
    <div class="container text-center">
        <h1>Se Connecter</h1>
        <img src="Public/img/iconLogin.webp" alt="icône utilisateur">

        <form action="connectUser" method="POST" class="container-form">

            <!-- bloc confirmation || erreur  -->
            <?php if (isset($erreur)): 
        if ($erreur) : ?>
            <div class="msg-error"><?= $erreur ?></div>
            <?php 
        endif;
          endif;
    ?>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Votre Email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" id="password" name="password"
                    placeholder="Votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>


        <p>Vous n'avez pas de compte ?</p>
        <div class="lien-connexion"><a href="createUser" class="createUser">Ici pour en créer un</a></div>
        <div class="lien-connexion"><a href="home" class="retourAccueil">Retour à l'accueil</a></div>

    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';