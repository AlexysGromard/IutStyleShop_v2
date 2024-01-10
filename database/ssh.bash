#!/bin/bash
#INSTALATION COMMANDE sshpass
# Ubuntu ou Debian 
#sudo apt-get install sshpass
#Sur CentOS ou RHEL :
#sudo yum install sshpass
#Sur macOS (utilisant Homebrew) :
#brew install sshpass
#sudo dnf install sshpass

#PRECONDITION
#verifier que c'est bien installer
if ! command -v sshpass &> /dev/null; then
    echo "Erreur : sshpass n'est pas installé."
    exit 1
fi


# CONSTANTE
default_username="user"
default_server_ip="172.26.82.50"
default_password="lJNb3Dg5"

#VARIABLE GLOBAL
# Initialiser les variables avec les valeurs par défaut
username="$default_username"
server_ip="$default_server_ip"
password="$default_password"


# CODE PRINCIPAL
# Traitement des arguments
while [ "$#" -gt 0 ]; do
    case "$1" in
        -user)
            username="$2"
            shift 2
            ;;
        -ip)
            server_ip="$2"
            shift 2
            ;;
        *)
            echo "Option non reconnue: $1"
            exit 1
            ;;
    esac
done

# Vérifier si les variables sont définies, sinon demander à l'utilisateur de les fournir
if [ -z "$username" ]; then
    read -p "Nom d'utilisateur: " username
fi

if [ -z "$server_ip" ]; then
    read -p "Adresse IP du serveur: " server_ip
fi


# Demander le mot de passe, utiliser le mot de passe par défaut si rien n'est saisi
read -s -p "Mot de passe (appuyez sur Entrée pour utiliser le mot de passe par défaut): " custom_password
password="${custom_password:-$default_password}"


echo "$username , $server_ip "

# Établir une connexion SSH
sudo sshpass -p "$password" ssh -o StrictHostKeyChecking=no "$username"@"$server_ip"
