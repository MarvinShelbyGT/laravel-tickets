# Système gestion des tickets

Le but de ce projet est de mettre en place un système de ticket permettant la résolution des problèmes.
Ce projet est paramétrer dans le but de régler les problèmes de l'entreprise dans laquelle je me trouve. 
Il y a donc des paramètres qui sont très précis à mon utilisation.

## Installation

__En cours pas encore terminé__

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
    - Il faut refaire les seeds pour les emplacements, etc...
- That's it: launch the main URL or go to __/login__ and login with default credentials __admin@admin.com__ - __password__


## Screenshots

![screenshot 01 | Créer un ticket](https://zupimages.net/viewer.php?id=20/17/ahcu.png)

![screenshot 02 | Affichage des tickets](https://zupimages.net/viewer.php?id=20/17/87tm.png)

![screenshot 02 | Affichage d'un ticket](https://zupimages.net/viewer.php?id=20/17/vd6f.png)

## Utilisation

Utilisation d'[AdminLTE3](https://adminlte.io/) avec le boilerplate [LaravelDaily](https://github.com/LaravelDaily/Laravel-AdminLTE3-Boilerplate)
