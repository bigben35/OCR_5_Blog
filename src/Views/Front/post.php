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
                <h4><strong>Châpo : </strong><?= $post['chapo']; ?></h4>
                <p><strong>Contenu : </strong><?= $post['contenu']; ?></p>
            </div>
        </article>
        <div><a href="blog" class="btn-form">Retour au blog</a></div>

    </section>
    <section id="section-comment">
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
                        datetime="<? $postComment['dateCreation']; ?>"><?= $postComment['dateCreation']; ?></time>
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
        <form method="POST" action="post&id=<?= $post['id']; ?>">
                     
                    
            
              
            <textarea class="comment" name="commentaire" placeholder="Votre commentaire" required></textarea>
            <input class="input-comment btn-comment btn btn-success btn-lg" type="submit" value="Commenter">
        </form>
        <?php
    endif;
    ?>
    </section>
</div>


<?php
$content = ob_get_clean();

require 'layouts/template.php';