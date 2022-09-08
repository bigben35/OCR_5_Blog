<?php
$title = "Page modification email";
$description = "Page modification email";
ob_start();
?>

<section id="updateEmail">
<div class="container text-center">
<h1>Nouvel Email</h1>

    <form action="index.php?action=updateEmail&id=<?= $_SESSION['id'] ?>" method="POST">
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
            <label for="oldEmail">Email actuel:</label>
            <input type="email" class="form-control" name="oldEmail" id="oldEmail" value="<?= $_SESSION['email'] ?>" readonly="readonly" required />
        </div>
        <div class="form-group">
            <label for="newEmail">Nouveau Email:</label>
            <input type="email" class="form-control" name="newEmail" id="newEmail" required />
        </div>
        <div class="form-group">
            <label for="emailConfirm">Confirmation Email:</label>
            <input type="email" class="form-control" name="emailConfirm" id="emailConfirm" required />
        </div>

        <button class="btn btn-success btn-lg" type="submit">Modifier</button>
       <div><a href="index.php?action=dashboardUser&id=<?= $_SESSION['id'] ?>">Retour</a></div>
    </form>
</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';