# ![Logo du Projet](/frontend/assets/favicon/favicon-32x32.png) IutStyleShop - Projet de 2ème année de BUT Informatique 
Le projet IutStyleShop est un projet de SEA du 3ème semestre de BUT Informatique. Il s'agit d'un site de e-commerce codé en PHP et utilisant une base de données MySQL (MariaDB). Ce projet a été réalisé par 4 étudiants.

Notre site est accessible à l'adresse suivante : [http://172.26.82.50/](http://172.26.82.50) (uniquement accessible depuis le réseau de l'IUT de Nantes).
## Sommaire
- [Installation](#Installation)
- [Licence](#Licence)
- [Documentation](#Documentation)
- [Maquette FIGMA](#Maquette-FIGMA)
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

## Maquette FIGMA
<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="800" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FkuvaY0SaERNiGETCjodf2p%2FProjet-Shop-IUT%3Ftype%3Ddesign%26node-id%3D13%253A2%26mode%3Ddesign%26t%3DCcyz2avKd2919NRW-1" allowfullscreen></iframe>

## Auteurs
- [Alexys Gromard](https://github.com/AlexysGromard)
- [Lancelot Jouault](https://github.com/IIXIVII)
- [Bryan Levy](https://gitlab.univ-nantes.fr/E224508F)
- [Floran Martel](https://github.com/FloranMARTEL)
