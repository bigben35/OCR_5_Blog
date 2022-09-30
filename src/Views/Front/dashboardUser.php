<?php
$title = "Tableau de bord utilisateur";
$description = "Tableau de bord utilisateur";
ob_start();
?>

<section id="dashboardUser">
    <div class="container text-justify">
        <?php if (isset($validation)):
                if($validation): 
                    
                    ?>
        <p class="msg-success"><?= $validation ?></p>
        <?php
                

                endif;
            endif;
            ?>
        <div>
            <h1>Bonjour <?= $_SESSION['pseudo'] ?> !</h1>
            <a href="pageUpdatePseudo&id=<?= $_SESSION['id'] ?>" class="btn btn-success btn-lg">Modifier votre
                pseudo</a>
        </div>
        <div>
            <a href="pageUpdateEmail&id=<?= $_SESSION['id'] ?>" class="btn btn-success btn-lg">Modifier
                votre email</a>
        </div>

        <div><a class="btn btn-success btn-lg" href="pageUpdatePassword&id=<?= $_SESSION['id'] ?>">Modifier votre mot de
                passe</a></div>

    </div>
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';