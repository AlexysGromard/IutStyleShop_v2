#!/bin/bash

# Commande mariadb
#
# SHOW DATABASES;
# USE your_database;
# SHOW TABLES;

password=''
user='root'
host='localhost'
database='DB_IutStyleShop'

# Database
echo ""
echo "Exécution des fichiers Database : "
sudo mysql --host=$host --user=$user --database="" --password=$password < "mariadb/database.sql"



# Table
echo ""
echo "Exécution des fichiers Tables : "
echo "* User"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/User.sql"

echo "* Article"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Article.sql"
echo "* Image"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Image.sql"
echo "* Accesoire"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Accesoire.sql"
echo "* Vetement"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Vetement.sql"

echo "* Panier"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Panier.sql"

echo "* Commentaire"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commentaire.sql"

echo "* Commande"
sudo mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commande.sql"
echo "* ArticleCommande"
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




