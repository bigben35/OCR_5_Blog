<?php 
$title = "Email envoyé";
$description = "Email envoyé";
ob_start(); ?>


<section id="section-confirm-mail">
    <div class="confirmSendMail">
        <h1>Votre Email a été envoyé avec succès ! 👏</h1>
    </div>
    <a href="index.php?action=home">Retourner à la page d'accueil</a>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';