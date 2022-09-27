<?php 
$title = "Commentaire envoyé";
$description = "Commentaire envoyé";
ob_start(); ?>


<section id="section-confirm-msg">
    <div class="container text-center">
        <h1>Votre Commentaire a été envoyé avec succès ! 👏</h1>
        <p>Il est en attente de validation de la part de l'administrateur.</p>
        <div><a href="home">Retourner à la page d'accueil</a></div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';