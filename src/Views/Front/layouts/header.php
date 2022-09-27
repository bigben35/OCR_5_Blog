<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $description ?>">
    <link rel="icon" type="image/png" href="Public/img/profile.png" />


    <title><?= $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="Public/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="Public/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="Public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="home">Web Code</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="home#about">A propos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="blog">Blog</a>
                    </li>
                    <li class="page-scroll">
                        <a href="home#contact">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION['role']) && ($_SESSION['role'] == "0")) :
                        ?>
                    <li class="page-scroll">
                        <a href="dashboardUser">Mon compte</a>
                    </li>
                    <li class="page-scroll">
                        <a href="deconnexion">Déconnexion</a>
                    </li>
                    <?php

                    elseif (isset($_SESSION['role']) && ($_SESSION['role'] == "1")) :
                        ?>
                    <li><a href="dashboard">Mon Compte A</a></li>
                    <li><a href="deconnexion">Déconnexion</a></li>
                    <?php
                        else :
                            ?>
                    <li class="page-scroll">
                        <a href="connexion">Connexion</a>
                    </li>
                    <li class="page-scroll">
                        <a href="createUser">Créer compte</a>
                    </li>

                    <?php
                    endif;
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>