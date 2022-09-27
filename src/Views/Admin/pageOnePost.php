<?php 

$title = $post->getTitre();
ob_start(); 
?>

<section class="section-article-admin">
    <h1><?= $post->getTitre(); ?></h1>

    <div class="text-justify">
        <p><span class="title-page-one-post">Titre :</span> <?= $post->getTitre(); ?></p>
        <p><span class="title-page-one-post">Chapô :</span> <?= $post->getChapo(); ?></p>
        <p><span class="title-page-one-post">Contenu :</span> <?= $post->getContenu(); ?></p>
        <p><span class="title-page-one-post">Dernière modification le :</span> <?= $post->getDateModif(); ?></p>
    </div>

    <div><a href="listPosts" class="btn btn-primary">Retour à la liste des articles</a></div>
</section>


<?php
$content = ob_get_clean();

require 'layoutsAdmin/template.php';