<?php
$title = "Tableau de bord utilisateur";
$description = "Tableau de bord utilisateur";
ob_start();
?>

<section id="dashboardUser">
    <div class="container text-center">
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
        <a href="index.php?action=pageUpdatePseudo&id=<?= $_SESSION['id'] ?>" class="btn btn-success btn-lg">Modifier votre pseudo</a>
        </div>
        <div>
        <h2>Votre Email : <?= $_SESSION['email'] ?></h2>
        <button>Modifier votre email</button>
        </div>
        <h2>Vos commentaires :</h2>
    </div>
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';