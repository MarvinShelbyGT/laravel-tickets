# Système gestion des tickets

Le but de ce projet est de mettre en place un système de ticket permettant la résolution des problèmes.
Ce projet est paramétrer dans le but de régler les problèmes de l'entreprise dans laquelle je me trouve. 
Il y a donc des paramètres qui sont très précis à mon utilisation.

## Installation

- Clone __git clone__ https://github.com/MarvinShelbyGT/laravel-tickets.git
- Copier __.env.example__ vers __.env__ et mettre à jour les paramètres
- Lancer __composer install__
- Lancer __npm install__
- Lancer __php artisan key:generate__
- Lancer __php artisan migrate --seed__ 
- Lancer __php artisan serve__ 
- Vous pouvez vous connecter à l'adresse 127.0.0.1:8000 avec les identifiants __admin@admin.com__ - __password__


## Screenshots

![screenshot 01 | Créer un ticket](https://user-images.githubusercontent.com/6048961/79837889-6e874e80-83b2-11ea-82bc-13c8b6d37e14.PNG)

![screenshot 02 | Affichage des tickets](https://user-images.githubusercontent.com/6048961/79837892-6f1fe500-83b2-11ea-8dc8-a21717547184.PNG)

![screenshot 02 | Affichage d'un ticket](https://user-images.githubusercontent.com/6048961/79837894-6fb87b80-83b2-11ea-8b20-726ea5d9a1db.PNG)

## A faire

[ ] Système d'assignation par ticket. Dans le cas ou le ticket est ouvert par un magasin par exemple
[ ] Ouverture d'un ticket par email

## Utilisation

Utilisation d'[AdminLTE3](https://adminlte.io/) avec le boilerplate [LaravelDaily](https://github.com/LaravelDaily/Laravel-AdminLTE3-Boilerplate)
