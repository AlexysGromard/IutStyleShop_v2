<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Vérification de l'adresse mail</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="frontend/styles/commentaire.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>



    <!-- Main -->
    <main id="commentaire-main">
    <p class="section-title-name">Espace de notation</p>
        <div class="Article-block">
        
        </div>
        <div class="commentaire-block">
            <div class="commentaire-part">
                <p>Votre note</p>
            </div>
            <form action="" method="post" class="form-commentaire">
                <div class="form-commentaire-part">
                    <label for="note1">
                        <img src="frontend\assets\images\Header-Image\Loupe.svg" alt="etoile">
                    </label>
                    <input type="radio" name="note" id="note1" value="1"/>
                    <label for="note2">
                        <img src="frontend\assets\images\Header-Image\Loupe.svg" alt="etoile">
                    </label>
                    <input type="radio" name="note" id="note2" value="2"/>
                    
                    <label for="note3">
                        <img src="frontend\assets\images\Header-Image\Loupe.svg" alt="etoile">
                    </label>
                    <input type="radio" name="note" id="note3" value="3"/>
                    <label for="note4">
                        <img src="frontend\assets\images\Header-Image\Loupe.svg" alt="etoile">
                    </label>
                    <input type="radio" name="note" id="note4" value="4"/>
                    <label for="note5">
                        <img src="frontend\assets\images\Header-Image\Loupe.svg" alt="etoile">
                    </label>
                    <input type="radio" name="note" id="note5" value="5"/>
                </div>
                <div class="form-commentaire-part">
                    <p>Commentaire</p>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Votre commentaire" oninput="compterCaracteres()"></textarea>
                    <p> <span id="nb-caractere">0</span> / 500 caractères</p>


                </div>

                <div class="form-commentaire-part">
                    
                </div>

                <div class="form-commentaire-part">
                    <input type="button" value="Annuler" onclick="retournerEnArriere()"/>
                    <input type="submit" value="Envoyer"/>
                </div>




            </form>

                
        </div>
        
    </main>

    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/commentaire.js"></script>
</html>