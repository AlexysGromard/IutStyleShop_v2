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
mysql --host='$host' --user='$user' --database='' --password='$password' < "mariadb/database.sql"



# Table
echo ""
echo "Exécution des fichiers Tables : "
echo "* User"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/User.sql"

echo "* Article"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Article.sql"
echo "* Image"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Image.sql"
echo "* Accesoire"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Accesoire.sql"
echo "* Vetement"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Vetement.sql"

echo "* Panier"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Panier.sql"

echo "* Commentaire"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commentaire.sql"

echo "* Commande"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/Commande.sql"
echo "* ArticleCommande"
mysql --host=$host --user=$user --database=$database --password=$password < "tables/ArticleCommande.sql"

# Trigger
echo ""
echo "Exécution des fichiers Triggers :"
dossier="Triggers"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    echo "* $fichier"
    mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done

# Package
echo ""
echo "Exécution des fichiers Package :"
dossier="Packages"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    echo "* $fichier"
    mysql --host=$host --user=$user --database=$database --password=$password < "$fichier"
done

