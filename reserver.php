<?php
  $message_envoye = " ";
  $message_non_envoye = " ";
  $message_formulaire_invalide = " ";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $debut_date = $_POST['debut_date'];
    $fin_date = $_POST['fin_date'];
    $telephone = $_POST['telephone'];
    /*
    ********************************************************************************************
    CONFIGURATION
    ********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer ? plusieurs ? la fois, s?parez-les par une virgule
    $destinataire = 'lasuitedelisabeth@gmail.com';

    // copie ? (envoie une copie au visiteur)
    $copie = 'oui'; // 'oui' ou 'non'

    /*
    ********************************************************************************************
    FIN DE LA CONFIGURATION
    ********************************************************************************************
    */


    /* 
        Nettoyage & enregistre le texte
    
    */

    function Rec($text)
    {
        $text = htmlspecialchars(trim($text), ENT_QUOTES);
        if (1 === get_magic_quotes_gpc()){
            $text = stripslashes($text);
        }

        $text = nl2br($text);
        return $text;
    };

    /*
        Cette fonction sert à vérifier la syntaxe de l'email
    */
    
    function IsEmail($email)
    {
        $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
        return (($value === 0) || ($value === false)) ? false : true;
    }

    // formulaire envoy?, on récupère tous les champs.
    $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
    $prenom  = (isset($_POST['prenom']))  ? Rec($_POST['prenom'])  : '';
    $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
    $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
    $debut_date = (isset($_POST['debut_date'])) ? Rec($_POST['debut_date']) : '';
    $fin_date = (isset($_POST['fin_date'])) ? Rec($_POST['fin_date']) : '';
    $telephone = (isset($_POST['telephone'])) ? Rec($_POST['telephone']) : '';

    // On va vérifier les variables et l'email ...
    $email = (IsEmail($email)) ? $email : '';

    if (($nom != '') && ($email != '') && ($message != '') && ($debut_date != '') && ($fin_date != '') && ($telephone != ''))
    {
        // les 4 variables sont remplies, on génère puis envoie le mail

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: lasuitedelisabeth'."\r\n" .
                'Reply-To:'.$email. "\r\n" .
                'Content-Disposition: inline'. "\r\n" .
                'Content-Transfer-Encoding: 7bit'." \r\n" .
                'X-Mailer:PHP/'.phpversion();

        // Passe la priorité du mail en urgente
        $headers .= "X-Priority : 1\n";

        // type de contenu HTML
        $headers .= "Content-type: text/html; charset=utf-8\n"; 


        // envoyer une copie au visiteur ?
        if ($copie == 'oui')
        {
            $cible = $destinataire.';'.$email;
        }
        else
        {
            $cible = $destinataire;
        };

        // Remplacement de certains caract?res sp?ciaux
        $caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '?',   '&rsquo;', '&lsquo;');
        $caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<'     );

        $objet = "Nouveau message de lasuitedelisabeth.fr" ;

        $message = html_entity_decode($message);
        $message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

        $messagesend = "
        Ce mail automatique a été émis depuis le site <b> lasuitedelisabeth.fr </b> parce que vous avez effectué une <b> demmande de réservation </b> <br>
        <br>
        Récapitulatif de votre demande : <br>
        <b>Nom :</b> $nom  <br>
        <b>Prénom :</b> $prenom  <br>
        <b>Téléphone :</b> $telephone  <br>
        <b>Email :</b> $email <br>
        <b>Message :</b> $message  <br>
        <b>Date de début de réservation :</b> $debut_date  <br>
        <b>Date de fin de réservation :</b> $fin_date <br> <br>
        Pour toutes modifications merci de nous tenir au courant au 06 89 57 25 55 ou au 06 15 30 93 90. <br>
        ";

        // Envoi du mail
        $num_emails = 0;
        $tmp = explode(';', $cible);
        foreach($tmp as $email_destinataire)
        {
          if (mail($email_destinataire, $objet, $messagesend, $headers))
              $num_emails++;
        }

        if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
        {
            $message_envoye = "<div class='messenvoyeform'> <p class='sizeupform' > Votre message a bien été envoyé ! </p> <br>
            <p class ='pform'> Merci pour votre demande, nous vous répondrons dans les 24h. </p> </div>";
        }
        else
        {
            $message_non_envoye = "<div style='background-color:rgba(255, 255, 255, 0.644); text-align:center;'  > <p class='sizeupform' style='text-align:center;' > Nous avons butté sur quelque chose</p> <br>
            <p style='color:red; margin-top:-30px; ' > L'envoi du mail a échoué, veuillez réessayer. </p> </div>";
            
        };
    }
    else
    {
        $message_formulaire_invalide = "<div style='background-color:rgba(255, 255, 255, 0.644); text-align:center;'  > <p class='sizeupform' style='text-align:center;' > Nous n'avons pas pu envoyé le formulaire </p> <br>
        <p style='color:red; margin-top:-30px; ' > Merci de vérifier que l'email soit sans erreur.  </p> </div>";
    };
}; // fin du if (!isset($_POST['envoi']))

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet"> <!-- Importation de la police Allura-->
        <link href="https://fonts.googleapis.com/css2?family=Allura&family=Roboto:wght@700&display=swap" rel="stylesheet"> <!-- Roboto B0OLD -->
        <title>La Suite d'Elisabeth</title>
        <meta name="description" content="Réserver l'appartement en location à Sarlat - lasuitedelisabeth">
    </head>
    
    <body>
    
    <nav>
        <div class="nav_gauche"><strong><a href="index.php">La Suite d'Elisabeth</a></strong></div>
        <div class="nav_droit">
            <div class="nav_droit_div"><a href="index.php">ACCUEIL</a></div>
            <div class="nav_droit_div"><a href="galerie.php">GALERIE PHOTOS</a></div>
            <div class="nav_droit_div"><a href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
            <div class="nav_droit_div"><a href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
            <div class="nav_droit_div active"><a href="reserver.php">RÉSERVER</a></div>
        </div>
    </nav>
    <div class="icon">
        <div class="hamburger hamburger-middle"></div>
    </div>
    <section class="menu-mobile ">
        <div class="menuM">
            <div class="menuMclass"><a class="couleurnavmobile" href="index.php">ACCUEIL</a></div>
            <div class="menuMclass"><a class="couleurnavmobile" href="galerie.php">GALERIE PHOTOS</a></div>
            <div class="menuMclass"><a class="couleurnavmobile" href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
            <div class="menuMclass"><a class="couleurnavmobile" href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
            <div class="menuMclass active"><a class="couleurnavmobile" href="reserver.php">RÉSERVER</a></div>
        </div>
    </section>

    <script type="text/javascript" src="js/nav-js.js"></script>

    <div class="margin-top">
        <h1 class="fonttitleglerie Roboto" > RESERVER </h1>
        <hr class="hrtitle">
        <p class="supporttxttitre Roboto"> Envoyez-nous votre message et nous vous contacterons dans les meilleurs délais. <br>
        Avant d'éffectuer une demande de date de réservation, merci de vérifier si celle-ci n'est pas déja prise : <u> <a href="calendrier-reservations.php" > voir le calendrier des réservations. </a> </u>
        </p>
    </div>


<div class="bkreserver" >

    <div class="centerformreserver">
        <div class="formcontainerreserv">
        
            <?= $message_envoye ?>
            <?= $message_formulaire_invalide ?>
            <?= $message_non_envoye ?>

            <p class="colorformulaire Roboto decalementformreserver"> Tous les champs sont obligatoires <p>

            <form method="post">

                <div class="flexcontainerreserv">
                    <input class="inputreserv" type="text" name="prenom" placeholder="Prénom" required>
                    <input class="inputreserv espacementflexreserv" type="text" name="nom" placeholder="Nom" required>
                </div>

                <div class="flexcontainerreserv">
                    <input class="inputreserv" type="email" id="email" name="email" placeholder="E-mail" required>
                    <input class="inputreserv espacementflexreserv" name="telephone" type="text" placeholder="Numéro de téléphone" required>
                </div>

                <textarea class="inputreserv" id="message" name="message" placeholder="Votre message ..." required></textarea>

                <div class="flexcontainerreserv">

                    <div class="inputreservdate">
                        <label class="colorformreserver Roboto" > Date de début : </label>
                        <div class="alignementcalendarreserver">
                            <input class="inputdatereserv" name="debut_date" min="2020-05-19" max="2300-05-19" type="date" required>
                        </div>
                    </div>
                    <div class="espacementflexreserv inputreservdate">
                        <label class="colorformreserver Roboto" > Date de Fin : </label>
                        <div class="alignementcalendarreserver">
                            <input class="inputdatereserv" name="fin_date" min="2020-05-19" max="2300-05-19" type="date" required>
                        </div>
                    </div>

                </div>

                <div class="centerboutonreserv">
                    <input type="submit" class="submitreserver Roboto" value="ENVOYER !">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
    include 'end-html.php';
    include 'footer.php';
?>