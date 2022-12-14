<?php
$title = "Tableau de bord de l'Administrateur";
$description = "Voici le tableau de bord de l'administrateur pour qu'il puisse ajouter, modifier ou supprimer des articles; autoriser les commentaires qui respectent les règles de bienséance, etc...";
ob_start();
?>


<h1>Bonjour <?= $_SESSION['pseudo'] ?>!</h1>

<section class="section-dashboard-admin container-admin">
    <a href="listUsers" class="bloc-section-admin">
        <i class="fa-solid fa-users"></i>
        <div class="bloc-info-admin">
            <h2>Utilisateurs</h2>
            <p class="count"><?php $user = $countUser->fetch() ?><?= $user[0] ?></p>
        </div>
    </a>
    <a href="listPosts" class="bloc-section-admin">
        <i class="fa-solid fa-file"></i>
        <div class="bloc-info-admin">
            <h2>Articles</h2>
            <p class="count"><?php $user = $countPost->fetch() ?><?= $user[0] ?></p>
        </div>
    </a>
    <a href="listComment" class="bloc-section-admin">
        <i class="fa-solid fa-comment"></i>
        <div class="bloc-info-admin">
            <h2>Commentaires</h2>
            <p class="count"><?php $user = $countComment->fetch() ?><?= $user[0] ?></p>
        </div>
    </a>
    <a href="listEmail" class="bloc-section-admin">
        <i class="fa-solid fa-envelope"></i>
        <div class="bloc-info-admin">
            <h2>E-mail</h2>
            <p class="count"><?php $user = $countEmail->fetch() ?><?= $user[0] ?></p>
        </div>
    </a>

    <a href="deconnexion" class="bloc-section-admin"><i class="fa-solid fa-lock"></i>
        <h2>Se déconnecter</h2>
    </a>


</section>

<?php $content = ob_get_clean(); ?>
<?php require 'layoutsAdmin/template.php';