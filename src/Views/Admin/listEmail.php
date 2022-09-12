<?php

$title = "Page listant les emails du Blog";
$description = "Page listant les emails du Blog";
ob_start();
?>

<section class="section-article-admin">
    <h1>liste Email:</h1>
    <div class="centrer-tableau">
        <table class="page-list-admin">
            <thead>
                <tr>
                    <th class="display-creation">Date envoi</th>
                    <th class="display-creation">Nom</th>
                    <th class="display-creation">Prénom</th>
                    <th>E-mail</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listEmail as $email) :?>
                <tr>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($email['dateCreation']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($email['nom']) ?></p>
                    </td>
                    <td class="display-creation">
                        <p><?= htmlspecialchars($email['prenom']) ?></p>
                    </td>
                    <td>
                        <p><?= htmlspecialchars($email['email']) ?></p>
                    </td>
        
                    <span class="display-action">
                        <td><a href="montrerMail&id=<?= $email['id'] ?>"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="supprimerMail&id=<?= $email['id'] ?>"><i
                                    class="fa-solid fa-trash-can"></i></a>

                        </td>
                    </span>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php'; 