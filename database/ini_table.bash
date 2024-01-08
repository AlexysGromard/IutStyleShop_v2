#!/bin/bash

# Demander l'avis pour la création de la base de données
read -p "Voulez-vous créer la base de données ? (y/n): " createDatabase

if [ "$createDatabase" == "y" ]; then
    # Définir les informations de connexion
    HOST="ubuntu.u-inf-j-c002-14"
    USER="votre_nom_utilisateur"
    PASSWORD="votre_mot_de_passe"
    DATABASE="DBiutstyleshop"
    
    # Commande pour créer la base de données
    mysql --host="$HOST" --user="$USER" --password="$PASSWORD" -e "CREATE DATABASE IF NOT EXISTS $DATABASE;"
    echo "Base de données créée."
else
    echo "Opération annulée. Aucune base de données n'a été créée."
fi

# Demander l'avis pour l'exécution du script SQL
read -p "Voulez-vous exécuter le script SQL ? (y/n): " executeSQL

if [ "$executeSQL" == "y" ]; then
    # Demander le chemin vers le fichier SQL
    read -p "Veuillez entrer le chemin vers le fichier SQL : " SQL_FILE
    
    # Commande pour exécuter le script SQL
    mysql --host="$HOST" --user="$USER" --password="$PASSWORD" --database="$DATABASE" < "$SQL_FILE"
    echo "Script SQL exécuté."
else
    echo "Opération annulée. Aucun script SQL n'a été exécuté."
fi
