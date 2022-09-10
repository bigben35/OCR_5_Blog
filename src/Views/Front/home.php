<?php
$title = "Page d'Accueil";
$description = "Bienvenue sur le blog Web Code! C'est un blog consacré au développement web, particulièrement à PHP et a son framework Symfony !";
ob_start();
?>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Josselin Crenn</span>
                    <hr class="star-light">
                    <span class="skills">Développeur Web - PHP/Symfony</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>A propos</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete
                    source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy
                    customization.</p>
            </div>
            <div class="col-lg-4">
                <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or
                    a graphic artist looking to share your projects, this template is the perfect starting point!</p>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="Public\cv\CV_DéveloppeurWeb_Josselin-Crenn.pdf" class="btn btn-lg btn-outline" target="_blank">
                    <i class="fa fa-download"></i> Mon CV
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid Section -->
<section class="success" id="blog">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Derniers articles postés</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <?php foreach ($lastPosts as $lastPost){
                    ?>


            <article class="col-sm-4 portfolio-item">
                <div class="content-post">
                    <p class="date-post"> Posté le <time><?= $lastPost['dateModif']; ?></time></p>
                    <h3><?= $lastPost['titre']; ?></h3>
                    <p><?= $lastPost['chapo']; ?></p>
                </div>

                <a href="post&id=<?= $lastPost['id']; ?>" class="btn btn-success btn-lg">Voir
                    l'article</a>
            </article>
            <?php
                    }; ?>
        </div>
        <div><a href="blog" class="btn btn-success btn-lg">Voir tous les articles</a></div>
    </div>
</section>


<?php include_once "contact.php"; ?>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';