<?php 
$title = "Page de modification article";
ob_start(); 
?>

<section class="section-article-admin">
<div class="container text-center">
    <h1>Modifier un Article :</h1>
    <form method="POST" action="updatePost&id=<?= $post->getId(); ?>">
    <?php if (isset($_SESSION['errors'])):
                if($_SESSION['errors']): 
                    foreach($_SESSION['errors'] as $e):
                    ?>
        <p class="msg-error"><?= $e ?></p>
        <?php
                endforeach;
                endif;
            endif;
            unset($_SESSION['errors']);
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
            <textarea class="form-control" name="chapo" id="chapo" cols="30" rows="10"><?= $post->getChapo(); ?></textarea>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu : </label>
            <textarea class="form-control" name="contenu" id="contenu" cols="60" rows="10"><?= $post->getContenu(); ?></textarea>
        </div>
        
        <!-- <input class="form-control" type="hidden" name="id" value=""> -->

        <button class="valide btn btn-primary" type="submit">Valider</button>
    </form>
</div>
</section>

<?php
$content = ob_get_clean();
require 'layoutsAdmin/template.php';