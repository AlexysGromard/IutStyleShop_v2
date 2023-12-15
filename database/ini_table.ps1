#PARAMETRE SCRIPT
param (
    [string]$Host = "",
    [string]$User = "",
    [string]$Password = "",
    [string]$Database = "",
    [switch]$CreateTables = $false,
    [switch]$CreateTriggers = $false,
    [switch]$CreatePackages = $false,
    [int]$ManualMode = 1,  # Valeurs possibles : -1 (Manual), 0 (AutoWithoutTest), 1 (AutoWithTest)
    [switch]$Help = $false
)

#VARIABLES GLOBALES
# Définir une constante pour le chemin du fichier PS1
$ScriptPath = $PSScriptRoot


$DatabaseInfo = [PSCustomObject]@{
    HOST = $Host
    USER = $User
    PASSWORD = $Password
    DATABASE = $Database
}


# Utiliser les paramètres
Write-Host "Host: $Host"
Write-Host "User: $User"
Write-Host "Password: $Password"
Write-Host "Database: $Database"


#IMPORTATION DES MODULES
# Importer le module MySQL.Data
Import-Module MySql.Data

#FONCTIONS
function Ecrire  {
    param (
        [Parameter(Mandatory=$true, Position=0)]
        [string]$texte,
        [Parameter(Position=1)]
        [ValidateSet("noir", "rouge", "vert", "jaune", "bleu", "magenta", "cyan", "blanc")]
        [string]$couleur = "blanc"
    )

    $couleurs = @{
        "noir" = 30
        "rouge" = 31
        "vert" = 32
        "jaune" = 33
        "bleu" = 34
        "magenta" = 35
        "cyan" = 36
        "blanc" = 37
    }

    $codeCouleur = $couleurs[$couleur]

    # Vérifier si la couleur est valide
    if (-not $codeCouleur) {
        Write-Host "Couleur invalide. Utilisation d'une couleur par défaut (blanc)."
        $codeCouleur = $couleurs["blanc"]
    }

    $esc = [char]27
    $reset = "${esc}[0m"

    # Afficher le texte avec la couleur spécifiée
    Write-Host "$esc[${codeCouleur}m$texte$reset"
}


function Connect-MySqlServer {
    param (
        [Parameter(Mandatory=$true, Position=0)]
        [string]$ConnectionString
    )

    # Créer la connexion
    $connection = New-Object MySql.Data.MySqlClient.MySqlConnection($ConnectionString)

    # Ouvrir la connexion
    $connection.Open()

    # Retourner la connexion
    return $connection
}





#PREPROCESSING
# Vérifier que le script est lancé sans le paramètre -Help
if ($Help) {
    $helpContent = Get-Content -Path "$ScriptPath\cmd\help.txt" -Raw
    Write-Host $helpContent
    exit
}

# Vérifier si MySQL est installé
$mysqlService = Get-Service | Where-Object { $_.DisplayName -eq 'MySQL' }



# Si ni MySQL ni MariaDB n'est installé, arrêter le script
if ($null -eq $mysqlService) {
    Write-Host "Ni MySQL ni MariaDB n'est installé. Arrêt du script."
    Exit
}


#CODE PRINCIPAL
# Définir les informations de connexion
$connectionString = "Server=$Host;User Id=$User;Password=$Password;Database=mysql"

# Créer la connexion
$connection = Connect-MySqlServer -ConnectionString $connectionString


#DATABASE
# Vérifier si la base de données existe
$query = "SHOW DATABASES LIKE '$Database';"
$command = $connection.CreateCommand()
$command.CommandText = $query
$result = $command.ExecuteScalar()

# Vérifier le résultat
if ($result -eq $Database) {
    Ecrire -texte "La base de données '$Database' existe." -couleur "vert"
} else {
    Ecrire -texte "La base de données '$Database' n'existe pas." -couleur "rouge"
    #Demander à l'utilisateur s'il veut créer la base de données
    $reponse = Read-Host "Voulez-vous créer la base de données '$Database' ? (O/N)"
    if ($reponse -ne "O") {
        Ecrire -texte "La base de données '$Database' n'a pas été créée." -couleur "rouge"
        Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge"   
        Ecrire -texte "Fin du script." -couleur "rouge"
        exit
    }

    # Créer la base de données
    Ecrire -texte "Création de la base de données '$Database'..."
    $query = "CREATE DATABASE $Database;"
    $command.CommandText = $query
    $result = $command.ExecuteNonQuery()

    # Vérifier le résultat
    if ($result -eq 0) {
        Ecrire -texte "La base de données '$Database' n'a pas été créée." -couleur "rouge"
        Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge" 
        Ecrire -texte "Creer la base de données '$Database' manuellement." -couleur "jaune"  
        Ecrire -texte "Fin du script." -couleur "rouge"
        exit
    }
    Ecrire -texte "La base de données '$Database' a été créée." -couleur "vert"

}


#TABLES
# Demander à l'utilisateur s'il veut créer ou mettre à jour les tables de la base de données
$reponse = Read-Host "Voulez-vous créer ou mettre à jour les tables de la base de données '$Database' ? (O/N)"
if ($reponse -eq "O") {
    # Demander à l'utilisateur s'il veut créer ou remplacer Toutes tables
    $reponse = Read-Host "Voulez-vous créer ou remplacer Toutes tables ? (O/N)"
    #si oui on lance toute les fichiers sql du dossier tables
    if ($reponse -eq "O") {
        Ecrire -texte "Création ou remplacement de toutes les tables..."
        #Récupérer la liste des fichiers SQL
        $fichiers = Get-ChildItem -Path "$ScriptPath\tables" -Filter "*.sql"
        #Parcourir la liste des fichiers SQL
        foreach ($fichier in $fichiers) {
            # Lire le contenu du fichier
            $contenu = Get-Content -Path $fichier.FullName
            # Exécuter le contenu du fichier
            $command.CommandText = $contenu
            $result = $command.ExecuteNonQuery()
            # Vérifier le résultat ou si le fichier sql a lancé une erreur
            if ($result -eq 0) {
                Ecrire -texte "Le fichier '$fichier' a rencontrer un probleme lors de l'execution." -couleur "rouge" 
                #On sauvegarde le fichier sql dans un dossier erreur

            }
            else{
                Ecrire -texte "Le fichier '$fichier' a été exécuté." -couleur "bleu"
            }

        }
        Ecrire -texte "Toutes les tables ont été créées ou remplacées." -couleur "vert"
    }
    else {
        #Demander à l'utilisateur s'il veut créer ou remplacer une table pour chaque fichier sql
        $fichiers = Get-ChildItem -Path "$ScriptPath\tables" -Filter "*.sql"
        #Parcourir la liste des fichiers SQL
        foreach ($fichier in $fichiers) {
            # Demander à l'utilisateur s'il veut créer ou remplacer la table
            $reponse = Read-Host "Voulez-vous créer ou remplacer la table '$fichier' ? (O/N)"
            if ($reponse -eq "O") {
                Ecrire -texte "Création ou remplacement de la table '$fichier'..."
                # Lire le contenu du fichier
                $contenu = Get-Content -Path $fichier.FullName
                # Exécuter le contenu du fichier
                $command.CommandText = $contenu
                $result = $command.ExecuteNonQuery()
                # Vérifier le résultat
                if ($result -eq 0) {
                    Ecrire -texte "La table '$fichier' a rencontrer un probleme lors de l'execution." -couleur "rouge"
                }
                Ecrire -texte "La table '$fichier' a été créée ou remplacée." -couleur "vert"
            }
        }
    }
}

# TRIGGERS


# PACKAGES

# TESTS


#FIN DU SCRIPT
# Fermer la connexion
$connection.Close()

# Afficher Le rapport du script

Ecrire -texte "\n\nRapport du script" -couleur "cyan"
$rapport = Get-Content -Path "$ScriptPath\cmd\rapport.txt" -Raw
Write-Host $rapport

#Ajouter le rapport dans un fichier log
$rapport | Out-File -FilePath "$ScriptPath\cmd\log\rapport.log" -Append

# Afficher un message de fin
Ecrire -texte "\nFin du script." -couleur "magenta"


$liste_Etape = 

$rapportEntry = @{
    "Date" = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    Liste_Etape = @(
        @{
        nom = "Tables"
        Liste_executer = @(
            @{
                nom = "Table 1"
                resultat = "OK"
            },
            @{
                nom = "Table 2"
                resultat = "OK"
            },
            @{
                nom = "Table 3"
            }
        )
    
    }
    @{
        nom = "Triggers"
        Liste_executer = @(
            @{
                nom = "Trigger 1"
                resultat = "OK"
            },
            @{
                nom = "Trigger 2"
                resultat = "OK"
            },
            @{
                nom = "Trigger 3"
            }
        )
    
    }
    )
}


