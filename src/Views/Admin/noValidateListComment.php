<?php

$title = "Page listant les commentaires non validés du Blog";
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
                <?php foreach ($noValidateComment as $comment) :?>
                <tr>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($comment['pseudo']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($comment['dateCreation']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($comment['titre']) ?></p>
                    </td>
                    <td>
                        <p class="max-content"><?= htmlspecialchars($comment['commentaire']) ?></p>
                    </td>
                    <div class="btn-comment">
                        <td><a href="validateComment&id=<?= $comment['id']; ?>" class="validate btn-action-admin">Valider</a></td>
                        <td>
                            <a href="deleteComment" class="btn-action-admin-red">Supprimer</a>
                        </td>
                    </div>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script src="Public/js/confirm.js" defer></script>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 