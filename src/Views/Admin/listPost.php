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
                    <th class="display-creation">Date de Modification</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <?php for($i=0; $i < count($posts); $i++) :?>
            <tr>
                <td><a title="afficher l'article"
                        href="onePost&id=<?= $posts[$i]->getId(); ?>"><?= $posts[$i]->getTitre(); ?></a>
                </td>
                <td class="display-creation"><?= $posts[$i]->getDateModif(); ?></td>
                <td class="action-list-admin"><a href="pageUpdatePost&id=<?= $posts[$i]->getId(); ?>"
                        class="btn-action-admin">Modifier</a>

                    <a href="deletePost&id=<?= $posts[$i]->getId(); ?>"
                        class="delete btn-action-admin-red">Supprimer</a>
                </td>
            </tr>
            <?php endfor; ?>
        </table>
        <a href="createPost" class="btn btn-primary">Ajouter</a>
    </div>
</section>

<script src="Public/js/confirm.js" defer></script>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 