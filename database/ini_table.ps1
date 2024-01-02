#PARAMETRE SCRIPT
param (
    [string]$Host = "",
    [string]$User = "",
    [string]$Password = "",
    [string]$Database = "",
    [switch]$CreateTables = $false,
    [switch]$CreateTriggers = $false,
    [switch]$CreatePackages = $false,
    [switch]$Help = $false,
    [int]$ManualMode = 1  # Valeurs possibles : -1 (Manual), 0 (AutoWithoutTest), 1 (AutoWithTest)

)

#IMPORTATION DES MODULES


# Importer le module MySQL.Data
Import-Module MySql.Data




#VARIABLES GLOBALES
# Définir une constante pour le chemin du fichier PS1
$ScriptPath = $PSScriptRoot


$DatabaseInfo = [PSCustomObject]@{
    HOST = $Host
    USER = $User
    PASSWORD = $Password
    DATABASE = $Database
}

# si les variables sont vides on les récupère dans le fichier DatabaseInfo.txt
if ($Host -eq "") {
    $DatabaseInfo = Get-Content -Path "$ScriptPath\cmd\DatabaseInfo.json" -Raw | ConvertFrom-Json
    $Host = $DatabaseInfo.HOST
    $User = $DatabaseInfo.USER
    $Password = $DatabaseInfo.PASSWORD
    $Database = $DatabaseInfo.DATABASE
}


# Utiliser les paramètres
Write-Host "Host: $Host"
Write-Host "User: $User"
Write-Host "Password: $Password"
Write-Host "Database: $Database"



# Variable qui contient les logs
$save_logs =  [PSCustomObject]@{
        Date = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
        Etape = @()
        Resultat = "OK"
    }





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

function log {
    param (
        [string]$Etape,
        [string]$decription,
        [string]$Resultat,
        [string]$nom_executer,
        [string]$Resultat_executer
    )
    # si l'etape est dans la liste des etapes on l'ajoute juste l'element executer
    if ($save_logs.Etape.Etape -contains $Etape) {
        $save_logs.Etape | Where-Object { $_.Etape -eq $Etape } | ForEach-Object {
            $_.Liste_executer += [PSCustomObject]@{
                nom = $nom_executer
                resultat = $Resultat_executer
            }
        }
    } else {
        $save_logs.Etape += [PSCustomObject]@{
            Etape = $Etape
            Decription = $decription
            Resultat = $Resultat
            Liste_executer = @(
                [PSCustomObject]@{
                    nom = $nom_executer
                    resultat = $Resultat_executer
                }
            )
        }
    }
    return 
}

function executer_script_sql {
    param (
        [string]$nom_dossier,
        [string]$connectionString
    )
    # Créer la connexion
    $connection = Connect-MySqlServer -ConnectionString $connectionString

    # execution du script

    # le mode manuel , automatique sans test et automatique avec test
    if ($ManualMode -eq -1){
        # demander a l'utilisateur si il veut executer le script sql
        $reponse = Read-Host "Voulez-vous executer le script sql '$nom_dossier' ? (O/N)"

        if ($reponse -ne "O") {
            Ecrire -texte "Le script sql '$nom_dossier' n'a pas été executer." -couleur "jaune"
            log -Etape "$nom_dossier" -decription "Le script sql '$nom_dossier' n'a pas été executer." -Resultat "KO" -nom_executer $nom_dossier -Resultat_executer "KO"
            
        } else {
            # recuperer tout les fichiers sql du dossier
            $chemin = "$ScriptPath\database\$nom_dossier"
            $fichiers = Get-ChildItem -Path $chemin -Filter "*.sql" -File
            # parcourir tout les fichiers sql
            foreach ($fichier in $fichiers) {
                # recuperer le contenu du fichier
                $contenu = Get-Content -Path $fichier.FullName
                # executer le contenu du fichier
                $command.CommandText = $contenu
                $result = $command.ExecuteNonQuery()
                # Vérifier le résultat
                if ($result -eq 0) {
                    Ecrire -texte "Le fichier '$fichier' a rencontrer un probleme lors de l'execution." -couleur "rouge"
                    Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge"   
                    Ecrire -texte "Executer le fichier '$fichier' manuellement." -couleur "jaune"  
                    Ecrire -texte "Fin du script." -couleur "rouge"
                    log -Etape "$nom_dossier" -decription -nom_executer $fichier -Resultat_executer "OK"
                }
                Ecrire -texte "Le fichier '$fichier' a été executer." -couleur "vert"
                log -Etape "$nom_dossier" -decription -nom_executer $fichier -Resultat_executer "OK"
            }
        }



    } else {
        # recuperer tout les fichiers sql du dossier
        $chemin = "$ScriptPath\database\$nom_dossier"
        $fichiers = Get-ChildItem -Path $chemin -Filter "*.sql" -File
        # parcourir tout les fichiers sql
        foreach ($fichier in $fichiers) {
            # recuperer le contenu du fichier
            $contenu = Get-Content -Path $fichier.FullName
            # executer le contenu du fichier
            $command.CommandText = $contenu
            $result = $command.ExecuteNonQuery()
            # Vérifier le résultat
            if ($result -eq 0) {
                Ecrire -texte "Le fichier '$fichier' a rencontrer un probleme lors de l'execution." -couleur "rouge"
                Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge"   
                Ecrire -texte "Executer le fichier '$fichier' manuellement." -couleur "jaune"  
                Ecrire -texte "Fin du script." -couleur "rouge"
                log -Etape "$nom_dossier"  -nom_executer $fichier -Resultat_executer "KO"
            }
            Ecrire -texte "Le fichier '$fichier' a été executer." -couleur "vert"
            log -Etape "$nom_dossier" -nom_executer $fichier -Resultat_executer "OK"
        }
    
    }


    
}



#PREPROCESSING
# Vérifier que le script est lancé sans le paramètre -Help
if ($Help) {
    $helpContent = Get-Content -Path "$ScriptPath\cmd\help.txt" -Raw
    Write-Host $helpContent
    log -Etape "Preprocessing" -decription "Affichage de l'aide" -Resultat "OK"
    $save_logs | Out-File -FilePath "$ScriptPath\cmd\log\rapport.log" -Append
    exit
}


# Vérifier si MySQL est installé
$mysqlService = Get-Service | Where-Object { $_.DisplayName -eq 'MySQL' }




# Si ni MySQL ni MariaDB n'est installé, arrêter le script
if ($null -eq $mysqlService) {
    Write-Host "Ni MySQL ni MariaDB n'est installé. Arrêt du script."
    log -Etape "Preprocessing" -decription "Ni MySQL ni MariaDB n'est installé." -Resultat "KO"
    $save_logs | Out-File -FilePath "$ScriptPath\cmd\log\rapport.log" -Append
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
    log -Etape "Database" -decription "La base de données '$Database' existe." -Resultat "OK"

} elseif($ManualMode -eq -1) {
    Ecrire -texte "La base de données '$Database' n'existe pas." -couleur "rouge"
    #Demander à l'utilisateur s'il veut créer la base de données
    $reponse = Read-Host "Voulez-vous créer la base de données '$Database' ? (O/N)"
    if ($reponse -ne "O") {
        Ecrire -texte "La base de données '$Database' n'a pas été créée." -couleur "rouge"
        Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge"   
        Ecrire -texte "Creer la base de données '$Database' manuellement." -couleur "jaune"  
        Ecrire -texte "Fin du script." -couleur "rouge"
        log -Etape "Database" -decription "La base de données '$Database' n'existe pas." -Resultat "KO"
        exit
    } else {
        # appel du script de creation de la base de données
        Ecrire -texte "Création de la base de données '$Database'..." -couleur "bleu"
        # execution du script de creation de la base de données
        $contenu = Get-Content -Path "$ScriptPath\database\create_database.sql"
        $command.CommandText = $contenu
        $result = $command.ExecuteNonQuery()
        # Vérifier le résultat
        if ($result -eq 0) {
            Ecrire -texte "La base de données '$Database' a rencontrer un probleme lors de l'execution." -couleur "rouge"
            Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge"   
            Ecrire -texte "Creer la base de données '$Database' manuellement." -couleur "jaune"  
            Ecrire -texte "Fin du script." -couleur "rouge"
            log -Etape "Database" -decription "La base de données '$Database' n'existe pas." -Resultat "KO"
            exit
        }
        Ecrire -texte "La base de données '$Database' a été créée." -couleur "vert"
        log -Etape "Database" -decription "La base de données '$Database' a été créée." -Resultat "OK"    
    }
} else {
# creer la base de donnees

    $contenu = Get-Content -Path "$ScriptPath\database\create_database.sql"
    $command.CommandText = $contenu
    $result = $command.ExecuteNonQuery()

    # Vérifier le résultat
    if ($result -eq 0) {
        Ecrire -texte "La base de données '$Database' a rencontrer un probleme lors de l'execution." -couleur "rouge"
        Ecrire -texte "Le script ne peut pas continuer." -couleur "rouge"   
        Ecrire -texte "Creer la base de données '$Database' manuellement." -couleur "jaune"  
        Ecrire -texte "Fin du script." -couleur "rouge"
        log -Etape "Database" -decription "La base de données '$Database' n'existe pas." -Resultat "KO"
        exit
    

    }
    Ecrire -texte "La base de données '$Database' a été créée." -couleur "vert"
    log -Etape "Database" -decription "La base de données '$Database' a été créée." -Resultat "OK"

}


#TABLES

# TRIGGERS
executer_script_sql -nom_dossier "Triggers" -connectionString $connectionString

# PACKAGES
executer_script_sql -nom_dossier "Packages" -connectionString $connectionString

# TESTS
if ($ManualMode -eq 1) {
    executer_script_sql -nom_dossier "Tests" -connectionString $connectionString
} elseif ($ManualMode -eq 0) {
    # demander a l'utilisateur si il veut executer le script sql
    $reponse = Read-Host "Voulez-vous executer le script sql 'Tests' ? (O/N)"

    if ($reponse -eq "O") {
        executer_script_sql -nom_dossier "Tests" -connectionString $connectionString
    }
    else {
        log -Etape "Tests" -decription "Le script sql 'Tests' n'a pas été executer." -Resultat "KO"
    }
} 


#FIN DU SCRIPT
# Fermer la connexion
$connection.Close()

# Afficher Le rapport du script

Ecrire -texte "\n\nRapport du script" -couleur "cyan"
Write-Host $save_logs

#Ajouter le rapport dans un fichier log
$save_logs | Out-File -FilePath "$ScriptPath\cmd\log\rapport.log" -Append

# Afficher un message de fin
Ecrire -texte "\nFin du script." -couleur "magenta"



