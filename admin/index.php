<?php
    session_start();
    require '../db.php';
    $erreur = " ";

    $Login = ""; 
    $Pass = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Login = $_GET['Login']; 
        $Pass = $_GET['Pass']; 

        if(isset($_POST['Login']) AND isset($_POST['Pass'])) { 
            if (!empty($_POST['Login']) AND !empty($_POST['Pass'])) {

                if( $Login == "a" && $Pass == "a" ) {
                    $_SESSION["Login"] = $Login;
                    $_SESSION["Pass"] = $mdp;
                    header("location:admin.php");         
                } else {
                    $erreur = "Nom d'utilisateur ou mot de passe incorrecte";
                }
            }
        } else {
            $erreur = "Erreur, L'identifiant ou le mot de passe n'est pas complété";
            echo $erreur;
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="stylelogin.css">
        <title>Connexion - Horry'Bord</title>
        <link rel="icon" href="../images/favicon.ico" />
    </head>
    <body>
        <!-- mennu -->
        <div class="content">
            <div class="fichecontact">
                <h3 class="titrecont">Connexion</h3>
                <form class="formcont" method="POST">
                    <div class="form-group">
                        <p>Si la terreur ne te fais pas peur… Connecte-toi ! </p>
                        <?= $erreur ?>
                        <label for="Login">Identifiant :</label>
                        <input type="text" name="Login" class="form-control" placeholder="Identifiant" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="Pass">Mot de passe :</label>
                        <input type="password" name="Pass" class="form-control" placeholder="Mot de passe" maxlength="45" required>
                        <a href="#" class="mpdoublie" > Mot de passe oublié ? </a>
                    </div>
                    <div class="form-group">
                        <button type="envoyer" value="ok"class="">Connexion</button>
                    </div>
                </form>
                <?php 
                    if(isset($error)){
                        echo $error;
                    }
                ?>
            </div>
        </div>
    </body>
</html>
