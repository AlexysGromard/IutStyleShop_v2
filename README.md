# ![Logo du Projet](/frontend/assets/favicon/favicon-32x32.png) IutStyleShop - Projet de 2ème année de BUT Informatique 
Le projet IutStyleShop est un projet de SEA du 3ème semestre de BUT Informatique. Il s'agit d'un site de e-commerce codé en PHP et utilisant une base de données MySQL (MariaDB). Ce projet a été réalisé par 4 étudiants.

## Sommaire
- [Installation](#Installation)
- [Licence](#Licence)
- [Documentation](#Documentation)
- [Auteurs](#Auteurs)

## Installation
Pour installer le projet, il faut tout d'abord cloner le projet sur votre machine. Pour cela, il faut utiliser la commande suivante :
```bash
git clone https://gitlab.univ-nantes.fr/pub/but/but2/sae3.real.01_developpement_d_une_application/groupe01/eq_01_05_gromard-alexys_jouault-lancelot_levy-bryan_martel-floran.git
```
Une fois le projet cloné, il faut installer les langages et outils suivants :
- PHP
- MariaDB

Une fois ces langages et outils installés, il faut créer une base de données nommée `DB_IutStyleShop`. Pour cela, vous devrez exécuter le script `commande.bash` situé dans le dossier `database` à l'aide de la commande suivante :
```bash 
./database/commande.bash
```
Une fois la base de données créée, il vous faudra simplement lancer le serveur PHP à l'aide de la commande suivante :
```bash 
php -S localhost:8080
```
Vous pourrez ensuite accéder au site à l'adresse suivante : `localhost:8080/`

## Licence
Le projet est sous licence ... (à définir). Pour plus d'informations, veuillez consulter le fichier `LICENSE`.

## Documentation
Voici la liste des documents disponibles pour le projet :
- [suivi.pdf](/docs/suivi.md) : Document de suivi du projet
- [analyse.pdf](/docs/analyse.pdf) : Document d'analyse du projet (R303)
- [management.pdf](/docs/management.md) : Document de management du projet (R310)
- [qualite_developpement.pdf](/docs/qualite_developpement.md) : Document de qualité du développement du projet (R302)

## Auteurs
- [Alexys Gromard](https://github.com/AlexysGromard)
- [Lancelot Jouault](https://github.com/IIXIVII)
- [Bryan Levy](https://gitlab.univ-nantes.fr/E224508F)
- [Floran Martel](https://github.com/FloranMARTEL)
