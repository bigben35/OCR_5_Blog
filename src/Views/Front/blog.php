<?php
$title = "Page Blog";
$description = "Page Blog";

ob_start();
?>

<section class="success" id="blogPosts">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Les Articles</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="post-container">
            <?php foreach ($posts as $post){
                    ?>


            <article class="post-card">
                <div class="content-post">
                    <p class="date-post"> Posté le <time><?= $post['dateModif']; ?></time></p>
                    <h3 class="title-post"><?= $post['titre']; ?></h3>
                    <p class="chapo"><?= $post['chapo']; ?></p>
                </div>

                <a href="post&id=<?= $post['id']; ?>" class="btn btn-success btn-lg">Voir
                    l'article</a>
            </article>
            <?php
                    }; ?>
        </div>

    </div>
</section>
<nav id="nav-pagination">
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "hidden" : "" ?>">
            <a href="blog&page=<?= htmlspecialchars($currentPage - 1) ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
            <a href="blog&page=<?= $page ?>" class="page-link"><?= $page ?></a>
        </li>
        <?php endfor ?>
        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <li class="page-item <?= ($currentPage == $pages) ? "hidden" : "" ?>">
            <a href="blog&page=<?= htmlspecialchars($currentPage + 1) ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>

<?php $content = ob_get_clean(); ?>
<?php require 'layouts/template.php';