<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./Public/js/confirm.js" defer></script>
    <!-- Bootstrap Core CSS -->
    <link href="Public/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="Public/css/styleAdmin.css">
    <title><?= $title ?></title>
</head>

<body>

    <!-- HEADER  -->
    <header id="dashboard-admin-header">

        <nav class="side-nav">
            <div class="wrapper">
                <div class="nav-bloc-black">
                    <a href="dashboard" class="title-admin"><?= $_SESSION['pseudo'] ?></a>
                </div>
                <div class="nav-bloc n-1">
                    <i class="fa-solid fa-users"></i>
                    <div class="sub-nav">
                        <h3>Membres</h3>
                        <ul>
                            <li><a href="listUsers">Utilisateurs inscrits</a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-2">
                    <i class="fa-solid fa-file"></i>
                    <div class="sub-nav">
                        <h3>Articles</h3>
                        <ul>
                            <li><a href="createPost">Créer un article</a></li>
                            <li><a href="listPosts">Liste des articles</a></li>

                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-3">
                    <i class="fa-solid fa-comment"></i>
                    <div class="sub-nav">
                        <h3>Commentaire</h3>
                        <ul>
                            <li><a href="listComment">Commentaires Valides</a></li>
                            <li><a href="noValidateComment">Commentaires à "valider"</a></li>

                        </ul>
                    </div>
                </div>
                <div class="nav-bloc n-4">
                    <i class="fa-solid fa-envelope"></i>
                    <div class="sub-nav">
                        <h3>E-mail</h3>
                        <ul>
                            <li><a href="listEmail">E-mail reçu</a></li>
                            <li><a href="#">E-mail à lire</a></li>

                        </ul>
                    </div>
                </div>
                <div class="nav-bloc">
                    <a href="index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
                <div class="nav-bloc n-5">
                    <a href="deconnexion"><i class="fa-solid fa-lock"></i></a>
                </div>

            </div>
        </nav>

    </header>

    <!-- CONTENU DE LA PAGE  -->
    <main id="main-dashboard-admin">
        <div class="container">
            <?= $content; ?>
        </div>
    </main>

</body>

</html>