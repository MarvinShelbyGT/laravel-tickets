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

![screenshot 01 | Créer un ticket](https://user-images.githubusercontent.com/6048961/79837889-6e874e80-83b2-11ea-82bc-13c8b6d37e14.PNG)

![screenshot 02 | Affichage des tickets](https://user-images.githubusercontent.com/6048961/79837892-6f1fe500-83b2-11ea-8dc8-a21717547184.PNG)

![screenshot 02 | Affichage d'un ticket](https://user-images.githubusercontent.com/6048961/79837894-6fb87b80-83b2-11ea-8b20-726ea5d9a1db.PNG)

## Utilisation

Utilisation d'[AdminLTE3](https://adminlte.io/) avec le boilerplate [LaravelDaily](https://github.com/LaravelDaily/Laravel-AdminLTE3-Boilerplate)
