<?php

$title = "Page listant les Utilisateurs du Blog";
$description = "Page listant les Utilisateurs du Blog";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste des Utilisateurs :</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th>Pseudo</th>

                    <th class="display-creation">Créé le</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsers as $listUser) :?>
                <tr>
                    <td>
                        <p><?= htmlspecialchars($listUser['pseudo']) ?></p>
                    </td>

                    <td class="display-creation">
                        <p><?= htmlspecialchars($listUser['dateCreation']) ?></p>
                    </td>

                    <td class="action-list-admin"><a href="#"
                            class="btn-action-admin">Voir</a>

                        <a href="#"
                            class="btn-action-admin-red">Bannir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 