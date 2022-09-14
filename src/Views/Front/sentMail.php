<?php 
$title = "Email envoyé";
$description = "Email envoyé";
ob_start(); ?>


<section id="section-confirm-mail">
    <div class="container text-center">
        <h1>Votre Email a été envoyé avec succès ! 👏</h1>
        <div><a href="index.php?action=home">Retourner à la page d'accueil</a></div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';