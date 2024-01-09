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
echo ""
echo " \e[35m Exécution des fichiers Database : "
echo "\e[34m* \e[0m $database \e[31m"
sudo mysql --host=$host --user=$user --database="" --password=$password < "mariadb/database.sql"



# Table
echo ""
echo "\e[35m Exécution des fichiers Tables : "
echo "\e[34m* \e[0m User \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/User.sql"

echo "\e[34m* \e[0m Article \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Article.sql"
echo "\e[34m* \e[0m Image \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Image.sql"
echo "\e[34m* \e[0m Accesoire \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Accesoire.sql"
echo "\e[34m* \e[0m Vetement \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Vetement.sql"

echo "\e[34m* \e[0m Panier \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Panier.sql"

echo "\e[34m* \e[0m Commentaire \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commentaire.sql"

echo "\e[34m* \e[0m Commande \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commande.sql"
echo "\e[34m* \e[0m ArticleCommande \e[31m"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/ArticleCommande.sql"

echo "\e[34m* \e[0m CodePromo \e[31m"

# Trigger
echo ""
echo "\e[35m Exécution des fichiers Trigger : "
dossier="Triggers"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    echo "\e[34m* \e[0m $fichier \e[31m"
    sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done

# Package
# echo ""
# echo "Exécution des fichiers Package :"
# dossier="Packages"
# find "$dossier" -type f -name "*.sql" | while read -r fichier; do
#     echo "* $fichier"
#     sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
# done

#Procedure Stockée
echo ""
echo "\e[35m Exécution des fichiers Procedure Stockée : "
dossier="ProcedureStocker"
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
    echo "\e[34m* \e[0m $fichier \e[31m"
    sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done


#Tests
echo ""
echo "\e[35m Exécution des fichiers Tests : "
dossier="Tests"
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
    echo "\e[34m* \e[0m $fichier \e[31m"
    sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done



