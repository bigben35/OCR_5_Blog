<?php

$title = "Page listant les articles du Blog";
$description = "Page listant les articles du Blog";
ob_start();
?>

<section class="section-article-admin">
    <h1>Liste de mes articles :</h1>
    <div class="container text-center">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th class="display-creation">Date de création</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <?php for($i=0; $i < count($posts); $i++) :?>
                <tr>
                <td><a title="afficher l'article"
                        href="#"><?= $posts[$i]->getTitre(); ?></a>
                </td>
                <td class="display-creation"><?= $posts[$i]->getDateCreation(); ?></td>
                <td class="action-list-admin"><a
                        href="#" class="btn-action-admin">Modifier</a>

                    <a href="#"
                        class="btn-action-admin-red">Supprimer</a>
                </td>
            </tr>
            <?php endfor; ?>
        </table>
        <a href="#" class="btn-form">Ajouter</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 