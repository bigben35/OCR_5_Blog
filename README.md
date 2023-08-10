[![Codacy Badge](https://app.codacy.com/project/badge/Grade/ed723c215dbf4468af34e1e9616b249b)](https://www.codacy.com/gh/bigben35/OCR_5_Blog/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=bigben35/OCR_5_Blog&amp;utm_campaign=Badge_Grade)

# OCR_5_Blog

Projet 5 DA PHP/Symfony. Réalisation d'un Blog en utilisant les langages HTML5, CSS3, PHP, SQL et JavaScript.

# Installation :
composer : https://getcomposer.org/download/

Téléchargez et exécutez Composer-Setup.exe

Faire un composer install

Faire un composer init dans votre terminal.

Dans votre terminal de commande, écrire composer pour savoir si le gestionnaire de dépendances a bien été installé.

# Variables d'environnement:
Possible avec Dotenv: faire un composer require vlucas/phpdotenv
Créer un fichier .env à la racine du projet en prenant .env.example comme modèle pour vous connecter à votre base de donnée

Editer ensuite le fichier .env avec les valeurs de connexion à la base de données

DB_HOST=your_host
DB_PORT=your_port
DB_USERNAME=username
DB_PASSWORD=password
DB_NAME=dbname

APP_ENV=development

# Gestion des erreurs avec Whoops:
faire un composer require filp/whoops

Faire un composer update pour actualiser l'installation du nouveau package.


# Installation du projet:
Faire un git clone https://github.com/bigben35/OCR_5_Blog.git
dans votre IDE (ex: VSCode).

J'ai utilisé XAMPP pour mon serveur local et phpMyAdmin pour la gestion de la base de données.

Utilisation de php 8 (Version php 8.0.12 de mon côté)
importer le blog-ocr-version-finale.sql dans votre base de données

# Démarrage du projet
Je suis sur XAMPP donc serveur Apache. J'ai un fichier .htaccess pour la réécriture d'URL. Vous pouvez lancer le projet sur votre localhost: **http://localhost/nom-du-dossier/home**. Vous pouvez également le retrouver hébergé ici: **https://www.josselin-crenn.fr/webcode/**

Pour vous connecter en tant qu'Admin : mail:jojo@gmail.com et password: azerty ou modifier le role (par 1) dans la base de données

