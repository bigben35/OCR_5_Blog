<?php

$title = "Page listant les articles du Blog";
$description = "Page listant les articles du Blog";
ob_start();
?>

<section class="section-article-admin">
    <h1>Liste de mes articles :</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th class="display-creation">Date de création</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            
            <td><a href="#"
                            class="btn-action-admin">Voir</a></td>
                    <td>
                        <a href="#"
                            class="btn-action-admin-red">Supprimer</a>
                    </td>
        </table>
        <a href="#" class="btn-form">Ajouter</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 