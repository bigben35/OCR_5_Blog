<?php
$title = "Tableau de bord utilisateur";
$descritpion = "Tableau de bord utilisateur";
ob_start();
?>

<section id="dashboardUser">
    <div class="container text-center">
        <div>
        <h1>Bonjour <?= $_SESSION['pseudo'] ?> !</h1>
        <button>Modifier votre pseudo</button>
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