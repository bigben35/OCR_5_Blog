<?php

$title = "Page listant les emails du Blog";
$description = "Page listant les emails du Blog";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste Email:</h1>
    <div class="centrer-tableau">
    <div class="table">
        <h3 class="table-title">Prénom et Nom</h3>
        <h3 class="table-title display-creation">Contenu de l'email</h3>
        <h3 class="table-title">Publié le</h3>
        <h3 class="table-title">Action</h3>
    </div>
    <div class="bg">
        <?php foreach ($listEmail as $email) : ?>
        <div class="table-results">
            <?php if($email['estVu'] == 0 ):?>
            <ul class="table-item gras">
                <?php else: ?>
                <ul class="table-item lu">
                    <?php endif; ?>
                    <li><?= $email["prenom"] . " " . $email["nom"] ?></li>
                    <li class="display-creation"><?= substr($email["message"], 0, 80) . "..."; ?></li>
                    <li><?= $email["dateCreation"]?></li>
                    <li class="flex">
                        <span class="btn"><a
                                href="showEmail&id=<?= $email['id']?>&estVu=<?=$email['estVu']?>"
                                title="Voir"><i class="fa-solid fa-eye"></i></a></span>
                        <span class="btn"><a class="delete"
                                href="deleteEmail&id=<?= $email['id'] ?>" title="Supprimer"
                                ><i class="fa-solid fa-trash-can"></i></a></span>
                    </li>
                </ul>
        </div>
        <?php endforeach; ?>
    </div>
       
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 