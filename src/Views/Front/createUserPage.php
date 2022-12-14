<?php
$title = "Page de Création d'un compte";
$description = "Page de Création d'un compte";
ob_start();
?>

<section id="createUser">
    <div class="container text-center">
        <h1>Créer votre compte</h1>
        <img src="Public/img/iconLogin.webp" alt="image login">

        <form action="storeUser" method="POST" class="container-form">

            <!-- bloc confirmation || erreur  -->
            <?php if (isset($erreur)): 
                    if ($erreur) :
                        foreach($erreur as $e):
             ?>
            <p class="msg-error"><?= $e ?></p>
            <?php 
            endforeach;
            endif;
        endif;
            ?>

            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Votre Pseudo"
                    value="<?php if(isset($pseudo)) echo htmlspecialchars($pseudo)?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Votre Email"
                    value="<?php if(isset($email)) echo htmlspecialchars($email)?>" required>
            </div>
            <div class="form-group">
                <label for="emailconf">Confirmation Email</label>
                <input class="form-control" type="email" id="emailconf" name="emailconf" placeholder="Votre Email"
                    value="<?php if(isset($emailconf)) echo htmlspecialchars($emailconf)?>" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="passwordconf">Confirmation Mot de passe</label>
                <input class="form-control" type="password" id="passwordconf" name="passwordconf" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="autorisation" required>
                <p class="form-check-label" for="autorisation">En m'inscrivant, j'accepte les conditions et la politique
                    de confidentialité du site Web Code</p>
            </div>
            <button type="submit" class="btn btn-primary createUserAccount">Créer un compte</button>
        </form>
        <p>Vous avez un compte ?</p>
        <div class="lien-connexion"><a href="connexion" class="createUser">Ici pour vous connecter à votre compte</a>
        </div>
        <div class="lien-connexion"><a href="home" class="retourAccueil">Retour à l'accueil</a></div>
    </div>
</section>

<script src="Public/js/createUser.js" defer></script>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';