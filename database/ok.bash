#!/bin/bash


dossier="Triggers"
find "$dossier" -type f -name "*.sql" | while read -r fichier; do
    mysql --host='localhost' --user='admin' --database='DB_IutStyleShop' --password='password' < "$fichier"
done
