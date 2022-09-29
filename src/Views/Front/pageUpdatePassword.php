<?php 
$title = "Votre nouveau mot de passe";
$description = "Votre nouveau mot de passe";
ob_start(); ?>


<section id="updatePassword">
    <div class="container text-center">
        <h1>Nouveau Mot de passe</h1>

        <form action="updatePassword&id=<?= $_SESSION['id'] ?>" method="POST">
            <?php if (isset($erreur)):
                if($erreur): 
                    foreach($erreur as $e):
                    ?>
            <p class="msg-error"><?= $e ?></p>
            <?php
                endforeach;
                endif;
            endif;
            ?>

            <div class="form-group">
                <label for="oldPassword">Mot de passe actuel:</label>
                <input type="password" class="form-control" name="oldPassword" id="oldPassword" required />
            </div>
            <div class="form-group">
                <label for="newPassword">Votre nouveau mot de passe:</label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" required />
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Confirmation mot de passe:</label>
                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required />
            </div>

            <button class="btn btn-success btn-lg" type="submit">Modifier</button>
            <div><a href="dashboardUser&id=<?= $_SESSION['id'] ?>">Retour</a></div>
        </form>

    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php'; ?>