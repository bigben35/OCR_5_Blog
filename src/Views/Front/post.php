<?php 

$title = $post['titre'];
ob_start(); 
?>


<section id="postBlog">
<div class="container text-start">
    <article class="single-post">
        <h1>Titre : <?= $post['titre']; ?></h1>
        
        <div class="paragraphe-post">
            <p><strong>Auteur : </strong><?= $post['auteur']; ?></p>
            <p><strong>Article modifié le : </strong><?= $post['dateModif']; ?></p>
            <h4><strong>Châpo : </strong><?= $post['chapo']; ?></h4>
            <p><strong>Contenu : </strong><?= $post['contenu']; ?></p>
        </div>
    </article>
    <div><a href="blog" class="btn-form">Retour au blog</a></div>
</div>
</section>



<?php
$content = ob_get_clean();

require 'layouts/template.php';