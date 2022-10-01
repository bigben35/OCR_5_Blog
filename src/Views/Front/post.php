<?php 

$title = $post['titre'];
ob_start(); 
?>


<div class="container text-center">
    <section id="postBlog">
        <article class="single-post">
            <h1>Titre : <?= $post['titre']; ?></h1>

            <div class="paragraphe-post">
                <p><strong>Auteur : </strong><?= $post['auteur']; ?></p>
                <p><strong>Article modifié le : </strong><?= $post['dateModif']; ?></p>
                <p><span class="text-post-content">Châpo : </span><?= $post['chapo']; ?></p>
                <p><span class="text-post-content">Contenu : </span><?= $post['contenu']; ?></p>
            </div>
        </article>


    </section>
    <section id="section-comment" class="text-justify">
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
                        datetime="<?= $postComment['dateCreation']; ?>"><?= $postComment['dateCreation']; ?></time>
                    :</strong>
            </p>

            <p class="p-comment"><?= trim($postComment['commentaire']) ?></p>
        </div>
        <?php
    endif;
        endforeach;
    if(isset($_SESSION['id'])):
        
    ?>


        <?php if(isset($_SESSION['errors'])):
                if($_SESSION['errors']):
            ?>
        <div class="message-erreur"><?= $_SESSION['errors'] ?></div>
        <?php
                    endif;
                endif;
                unset($_SESSION['errors']);
                    ?>
        <?php
            if(isset($valide)):
                ?>
        <div class="msg-success"><?= $valide; ?></div>

        <?php
            endif;
            ?>
        <form method="POST" action="post&id=<?= $post['id']; ?>" class="comment-form">
            <textarea class="comment" name="commentaire" placeholder="Votre commentaire" required></textarea>
            <input class="input-comment btn-comment btn btn-success btn-lg" type="submit" value="Commenter">
        </form>
        <?php
    endif;
    ?>
    </section>
    <div><a href="blog" class="btn btn-success btn-lg">Retour au blog</a></div>
</div>


<?php
$content = ob_get_clean();

require 'layouts/template.php';