#!/bin/bash

# Commande mariadb
#
# SHOW DATABASES;
# USE your_database;
# SHOW TABLES;

password='password'
user='admin'
host='localhost'
database='DB_IutStyleShop'

# Database
echo -e ""
echo -e " \e[35m Exécution des fichiers Database : "
echo -e "    \e[34m * \e[0m $database \e[31m"
sudo mysql --host=$host --user=$user --database="" --password=$password < "mariadb/database.sql"


    
    
# Table
echo -e ""
echo -e "\e[35m Exécution des fichiers Tables : "
echo -e "    \e[34m * \e[0m User \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/User.sql"

echo -e "    \e[34m * \e[0m Article \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Article.sql"
echo -e "    \e[34m * \e[0m Image \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Image.sql"
echo -e "    \e[34m * \e[0m Accesoire \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Accesoire.sql"
echo -e "    \e[34m * \e[0m Vetement \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Vetement.sql"

echo -e "    \e[34m * \e[0m Panier \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Panier.sql"

echo -e "    \e[34m * \e[0m Commentaire \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commentaire.sql"

echo -e "    \e[34m * \e[0m Commande \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commande.sql"
echo -e "    \e[34m * \e[0m ArticleCommande \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/ArticleCommande.sql"

echo -e "    \e[34m * \e[0m CodePromo \e[31m"

# Trigger
echo -e ""
echo -e "\e[35m Exécution des fichiers Trigger : "
dossier="Triggers"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    echo -e "    \e[34m * \e[0m $fichier \e[31m"
    sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done

# Package
# echo -e ""
# echo -e "\e[35m Exécution des fichiers Package :      \e[31m"
# dossier="Packages "
# find "$dossier" -type f -name "*.sql" | while read -r fichier; do
#     echo -e "\e[34m * \e[0m * $fichier"
#     sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
# done

#Procedure Stockée
echo -e ""
echo -e "\e[35m Exécution des fichiers Procedure Stockée : "
dossier="ProcedureStocke"
# ProcedureStocker/
# ├── Article
# ├── CodePromo
# │   ├── DeleteCodePromo.sql
# │   ├── GetAllCodePromo.sql
# │   ├── GetCodePromo.sql
# │   ├── InsertCodePromo.sql
# │   └── UpdateCodePromo.sql
# ├── Commande
# ├── Commentaire
# ├── Panier
# │   ├── DeleteAllPanier.sql
# │   ├── DeleteArticlePanier.sql
# │   └── InsertPanier.sql
# └── User

find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    echo -e "    \e[34m * \e[0m $fichier \e[31m"
    sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done




