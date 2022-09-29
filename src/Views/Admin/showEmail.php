<?php 
$title = "Email lecture";
$description = "Votre email en cours";
ob_start(); ?>

<section class="section-email-admin">
    <div class="container text-center">
        <h1>Email de "<?= $sawEmail["prenom"] . " " . $sawEmail["nom"]; ?>"</h1>
        <div>
            <div>
                <p><strong>Objet</strong> : <?= $sawEmail['objet']; ?></p>
                <p><strong>Message</strong> : <?= $sawEmail['message']; ?></p>
                <p><strong>Date</strong> : <?= $sawEmail['dateCreation']; ?></p>
            </div>
        </div>
        <span class="btn"><a title="retour" href="listEmail"><i class="fa-solid fa-arrow-left"></i></a></span>
        <span class="btn"><a class="delete" href="deleteEmail&id=<?= $sawEmail['id'] ?>"><i
                    class="fa-solid fa-trash-can"></i></a></span>

    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 