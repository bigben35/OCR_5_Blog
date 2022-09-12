<?php

$title = "Page listant les commentaires du Blog";
$description = "Page listant les commentaires du Blog";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste des commentaires :</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th class="display-creation">Pseudo</th>
                    <th class="display-creation">Posté le</th>
                    <th class="display-creation">Article en question</th>
                    <th>Commentaire</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listComment as $comment) :?>
                <tr>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($comment['pseudo']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($comment['dateCreation']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($comment['title']) ?></p>
                    </td>
                    <td>
                        <p class="max-content"><?= htmlspecialchars($comment['commentaire']) ?></p>
                    </td>

                    <td><a title="montrer commentaire" href="montrerComment&id=<?= $comment['id'] ?>"
                            class="btn-action-admin">Voir</a></td>
                    <td>
                        <a title="supprimer commentaire" href="supprimerComment&id=<?= $comment['id'] ?>"
                            class="btn-action-admin-red">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 