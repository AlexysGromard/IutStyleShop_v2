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
echo "Exécution des fichiers Database : "
echo "* DB_IutStyleShop"
sudo mysql --host=$host --user=$user --database="" --password=$password < "mariadb/database.sql"



# Table
echo ""
echo "Exécution des fichiers Tables : "
echo "\e[0m* User"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/User.sql"

echo "\e[0m* Article"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Article.sql"
echo "\e[0m* Image"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Image.sql"
echo "\e[0m* Accesoire"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Accesoire.sql"
echo "\e[0m* Vetement"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Vetement.sql"

echo "\e[0m* Panier"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Panier.sql"

echo "\e[0m* Commentaire"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commentaire.sql"

echo "\e[0m* Commande"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commande.sql"
echo "\e[0m* ArticleCommande"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/ArticleCommande.sql"

# Trigger
echo ""
echo "Exécution des fichiers Triggers :"
dossier="Triggers"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    echo "* $fichier"
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
echo "Exécution des fichiers Procedure Stockée :"
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
    echo "* $fichier"
    sudo mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done




