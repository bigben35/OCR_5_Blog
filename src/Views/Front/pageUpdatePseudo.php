<?php
$title = "Page modification pseudo";
$description = "Page modification pseudo";
ob_start();
?>

<section id="updatePseudo">
    <div class="container text-center">
        <h1>Nouveau Pseudo</h1>

        <form action="updatePseudo&id=<?= $_SESSION['id'] ?>" method="POST">
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
                <label for="oldPseudo">Pseudo actuel:</label>
                <input type="text" class="form-control" name="oldPseudo" id="oldPseudo"
                    value="<?= $_SESSION['pseudo'] ?>" readonly="readonly" required />
            </div>
            <div class="form-group">
                <label for="newPseudo">Nouveau Pseudo:</label>
                <input type="text" class="form-control" name="newPseudo" id="newPseudo" required />
            </div>
            <div class="form-group">
                <label for="pseudoConfirm">Confirmation Pseudo:</label>
                <input type="text" class="form-control" name="pseudoConfirm" id="pseudoConfirm" required />
            </div>

            <button class="btn btn-success btn-lg" type="submit">Modifier</button>
            <div><a href="dashboardUser&id=<?= $_SESSION['id'] ?>">Retour</a></div>
        </form>
    </div>
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';