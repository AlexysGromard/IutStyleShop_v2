
# Obtenez le chemin complet du répertoire où le script est exécuté
$scriptDirectory = $PSScriptRoot

# Variables
$password = 'root'
$user = 'root'
$p_host = 'localhost'
$port = 3306
$database = 'DB_IutStyleShop'
$database = 'DB_IutStyleShop'

# Service
$service = "mariadb"
$status = Get-Service -Name $service | Select-Object -ExpandProperty Status

if ($status -eq 'Running') {
    Write-Host "$service est deja actif." -ForegroundColor Green
}
else {
    Write-Host "$service n'est pas actif." -ForegroundColor Yellow

    
    Start-Service -Name $service
    Start-Sleep -Seconds 5  # Attendre un moment pour que le service demarre

    $status = Get-Service -Name $service | Select-Object -ExpandProperty Status

    if ($status -eq 'Running') {
        Write-Host "$service est bien lance." -ForegroundColor Green
    }
    else {
        Write-Host "$service ne s'est pas lance." -ForegroundColor Red
    }
}


#mysql -h$p_host -P$port -u$user -p$password -e"CREATE DATABASE IF NOT EXISTS $database;" 


# Database
Write-Host ""
Write-Host "Execution des fichiers Database : " -ForegroundColor Magenta

$sqlContent = Get-Content (Join-Path $scriptDirectory "mariadb\database.sql") | Out-String
mysql -h"$p_host" -P"$port" -u"$user" -p"$password" -e"$sqlContent" 

Write-Host "    * $database" -ForegroundColor Yellow



# Table
# Tables
Write-Host ""
Write-Host "Execution des fichiers Tables : " -ForegroundColor Magenta
$tables = @("User.sql", "Article.sql", "Image.sql", "Accesoire.sql", "Vetement.sql", "Panier.sql", "Commentaire.sql", "Commande.sql", "ArticleCommande.sql", "CodePromo.sql")

foreach ($table in $tables) {
    $sqlContent = Get-Content (Join-Path $scriptDirectory "tables\$table") | Out-String


    mysql -h"$p_host" -P"$port" -u"$user" -p"$password" -D"$database"  -e"$sqlContent"
    Write-Host "    * $table" -ForegroundColor Yellow
}


#Procedure Stockée
Write-Host ""
Write-Host "Execution des fichiers Procedure Stockee : " -ForegroundColor Magenta

# Parcourir les fichiers SQL et les exécuter
$dossier = Join-Path $scriptDirectory "ProcedureStocke"
Write-Host "Exécution du fichier $dossier" -ForegroundColor Cyan

Get-ChildItem -Path $dossier -Filter *.sql -Recurse | ForEach-Object {
    $fichier = $_.FullName

    $sqlContent = Get-Content $fichier | Out-String
    mysql --host=$p_host --user=$user --database=$database --password=$password -e"$sqlContent"

    Write-Host "    * $fichier" -ForegroundColor DarkYellow 
}



#Procedure test
Write-Host ""
Write-Host "Execution des fichiers Tests : " -ForegroundColor Magenta

# Parcourir les fichiers SQL et les exécuter
$dossier = Join-Path $scriptDirectory "Tests"
Write-Host "Exécution du fichier $dossier" -ForegroundColor Cyan

Get-ChildItem -Path $dossier -Filter *.sql -Recurse | ForEach-Object {
    $fichier = $_.FullName

    $sqlContent = Get-Content $fichier | Out-String
    mysql --host=$p_host --user=$user --database=$database --password=$password -e"$sqlContent"

    Write-Host "    * $fichier" -ForegroundColor DarkYellow 
}

#Procedure Triggers
Write-Host ""
Write-Host "Execution des fichiers Triggers : " -ForegroundColor Magenta

# Parcourir les fichiers SQL et les exécuter
$dossier = Join-Path $scriptDirectory "Triggers"
Write-Host "Exécution du fichier $dossier" -ForegroundColor Cyan

Get-ChildItem -Path $dossier -Filter *.sql -Recurse | ForEach-Object {
    $fichier = $_.FullName

    $sqlContent = Get-Content $fichier | Out-String
    mysql --host=$p_host --user=$user --database=$database --password=$password -e"$sqlContent"

    Write-Host "    * $fichier" -ForegroundColor DarkYellow 
}

