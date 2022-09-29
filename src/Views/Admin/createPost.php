<?php
$title = "Page ajout d'un article";
$description = "Page ajout d'un article";
ob_start();
?>


<section id="section-addPost">
    <div class="container text-center">
        <h1>Créer un Article :</h1>
        <form action="addPost" method="POST">
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

            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" class="form-control" name="titre" id="titre" required />
            </div>
            <div class="form-group">
                <label for="chapo">Chapô:</label>
                <textarea class="form-control" name="chapo" id="chapo" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu:</label>
                <textarea class="form-control" name="contenu" id="contenu" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="auteur">Auteur:</label>
                <input type="text" class="form-control" name="auteur" id="auteur"
                    value="<?= ucfirst($_SESSION['pseudo']) ?>" readonly="readonly" required />
            </div>


            <button class="btn btn-primary" name="submit" type="submit">Valider</button>
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php';