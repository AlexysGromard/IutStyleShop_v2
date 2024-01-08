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
mysql --host='$host' --user='$user' --database='' --password='$password' < "mariadb/database.sql"



# Table
mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/User.sql"

mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Article.sql"
mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Image.sql"
mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Accesoire.sql"
mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Vetement.sql"

mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Panier.sql"

mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Commentaire.sql"

mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/Commande.sql"
mysql --host='$host' --user='$user' --database='$database' --password='$password' < "tables/ArticleCommande.sql"

# Trigger

dossier="Triggers"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    mysql --host='localhost' --user='admin' --database='DB_IutStyleShop' --password='password' < "$fichier"
done

