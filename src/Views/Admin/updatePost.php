<?php 
$title = "Page de modification article";
ob_start(); 
?>

<section class="section-article-admin">
<div class="container text-center">
    <h1>Modifier un Article :</h1>
    <form method="POST" action="updatePost&id=<?= $post->getId(); ?>">
    <?php if (isset($erreur)):
                if($erreur): 
                    foreach($erreur as $e):
                    ?>
        <p class="msg-error"><?= $e ?></p>
        <?php
                endforeach;
                endif;
            endif;
            ?>
 <?php if (isset($valide)):
                if($valide): 
                    
                    ?>
                <p class="msg-success"><?= $valide ?></p>
                <?php
                

                endif;
            endif;
            ?>
        <div class="form-group">
            <label for="titre">Titre : </label>
            <input class="form-control" type="text" id="titre" name="titre" value="<?= $post->getTitre(); ?>">
        </div>
        <div class="form-group">
            <label for="chapo">Chapô : </label>
            <input class="form-control" type="text" name="chapo" id="chapo" value="<?= $post->getChapo(); ?>">
        </div>
        <div class="form-group">
            <label for="contenu">Contenu : </label>
            <textarea name="contenu" id="contenu" cols="60" rows="10" value="<?= $post->getContenu(); ?>"></textarea>
        </div>
        
        <input class="form-control" type="hidden" name="id" value="<?= $post->getId(); ?>">

        <button type="submit" class="btn-form">Valider</button>
    </form>
</div>
</section>

<?php
$content = ob_get_clean();
require 'layoutsAdmin/template.php';