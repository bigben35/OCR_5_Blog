<?php 

$title = $post->getTitre();
ob_start(); 
?>

<section class="section-article-admin">
    <h1><?= $post->getTitre(); ?></h1>
    <div>
        <div>
            <p>Titre : <?= $post->getTitre(); ?></p>
            <p>Chapô : <?= $post->getChapo(); ?></p>
            <p>Contenu : <?= $post->getContenu(); ?></p>
            <p>Créé le : <?= $post->getDateCreation(); ?></p>
        </div>
    </div>
    <div><a href="listPosts" class="text-success">Retour à la liste des articles</a></div>
</section>


<?php
$content = ob_get_clean();

require 'layoutsAdmin/template.php';