<?php 

$title = $post['titre'];
ob_start(); 
?>


<div class="container text-start">
<section id="postBlog">
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

</section>
<section id="comment">
    <div>
        <?php
        if($numberComment > 1) : ?>
            
        <h1>Commentaires (<?= $numberComment; ?>)</h1>
        <?php
        else :
            ?>
            <h1>Commentaire (<?= $numberComment; ?>)</h1>
        <?php
        endif;
        ?>
    </div>
    <?php
        foreach($postComments as $postComment) : 
            if($postComment['estValide'] == 1): ?>
    <div>
        <p><strong> Posté par <?= $postComment['pseudo'] ?> le <time
                    datetime="<? $postComment['dateCreation']; ?>"><?= $postComment['dateCreation']; ?></time> :</strong>
        </p>

        <p class="p-comment"><?= rtrim($postComment['commentaire']) ?></p>
    </div>
    <?php
endif;
     endforeach;
if(isset($_SESSION['id'])):
        
    ?>
   

    <form method="POST" action="post&id=<?= $post['id']; ?>">
    <?php if(isset($erreur)):
                if($erreur):
            ?>
        <div class="message-erreur"><?= $erreur ?></div>
        <?php
                    endif;
                endif;
                    ?>
        <textarea name="commentaire" placeholder="Votre commentaire" required></textarea>
        <input class="btn-comment" type="submit" value="Commenter">
    </form>
    <?php
    endif;
    ?>
</section>
</div>


<?php
$content = ob_get_clean();

require 'layouts/template.php';