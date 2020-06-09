<?php
  $message_envoye = " ";
  $message_non_envoye = " ";
  $message_formulaire_invalide = " ";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $telephone = $_POST['telephone'];
    /*
    ********************************************************************************************
    CONFIGURATION
    ********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer ? plusieurs ? la fois, s?parez-les par une virgule
    $destinataire = 'leo.philip@mmibordeaux.com';

    // copie ? (envoie une copie au visiteur)
    $copie = 'non'; // 'oui' ou 'non'

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
    $telephone = (isset($_POST['telephone'])) ? Rec($_POST['telephone']) : '';

    // On va vérifier les variables et l'email ...
    $email = (IsEmail($email)) ? $email : '';

    if (($nom != '') && ($email != '') && ($message != '') && ($telephone != ''))
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
        Ce mail automatique a été émis depuis le site <b> lasuitedelisabeth.fr </b> <br> <br>
        Un utilisateur à une <b> question pour vous </b> <br> <br>
        <b>Nom :</b> $nom  <br>
        <b>Prénom :</b> $prenom  <br>
        <b>Téléphone :</b> $telephone  <br>
        <b>Email :</b> $email <br>
        <b>Message :</b> $message 
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
            <p class ='pform'> Merci pour votre question, nous vous répondrons dans les 24h. </p> </div>";
        }
        else
        {
            $message_non_envoye = "Nous avons butté sur quelque chose <br>
            <p style='color:red;' > L'envoi du mail a échoué, veuillez réessayer. </p>";
            
        };
    }
    else
    {
        $message_formulaire_invalide = " Nous n'avons pas pu envoyé le formulaire <br>
        <p style='color:red;'> Merci de vérifier que l'email soit sans erreur.  </p>";
    };
}; // fin du if (!isset($_POST['envoi']))

?>
<?php
    include 'start-html.php';
?>

<nav>
    <div class="nav_gauche"><strong><a href="index/index.php">La Suite d'Elisabeth</a></strong></div>
    <div class="nav_droit">
        <div class="nav_droit_div active"><a href="index.php">ACCUEIL</a></div>
        <div class="nav_droit_div"><a href="galerie.php">GALERIE PHOTO</a></div>
        <div class="nav_droit_div"><a href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
        <div class="nav_droit_div"><a href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
        <div class="nav_droit_div"><a href="reserver.php">RÉSERVER</a></div>
    </div>
</nav>
<div class="icon">
    <div class="hamburger hamburger-middle"></div>
</div>
<section class="menu-mobile ">
    <div class="menuM">
        <div class="menuMclass active"><a class="couleurnavmobile" href="index.php">ACCUEIL</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="galerie.php">GALERIE PHOTOS</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="reserver.php">RÉSERVER</a></div>
    </div>
</section>

<script type="text/javascript" src="../js/nav-js.js"></script>



    <div class="index1">
        <div class="index1_center">
            <h1> <span class="Allura titreindex" > La suite d'Elisabeth </span> </h1>
            <p class="Roboto"> Un appartement de charme situé en plein cœur de la cité médiévale </p>
            <div class="footerpage1">
                <div class="flechedownlabel Roboto"> <a class="aUnstyle" href="#galerieindex" >Découvrir</a></div>
                <div><a href="#galerieindex" ><img class="flecheverslebasindex1" src="images/arrow-down.png" alt="Fleche vers le bas pour changer de page"></a></div>
            </div>
        </div>
    </div>
    <span id="galerieindex"></span>
    <div class="index2">
        <div class="page2flex">

            <div class="flextaillepage2">
                <div class="centrerflexpage2">
                    <div>
                        <div class="flexgalerie">
                            <div class="flexflexgalerie" >
                                <div class="barregalerie"></div>
                            </div>
                            <div class="petittxtgalerie Roboto" > Réservez l'appartement de vos rêves </div>
                        </div>
                        <div class="txtgalerie Roboto" >GALERIE PHOTOS</div>
                        <a href="../galeriephoto/galerie.php" ><input class="boutongalerie Roboto" type="button" value="VOIR LA GALERIE"></a>
                    </div>
                </div>
            </div>
            <div class="flextaillepage2">
                <img class="limitationimgpage2" src="images/1.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

        </div>

        <div class="page2flex">

            <div class="flextaillepage2" >
                <img class="limitationimgpage2" src="images/20.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

            <div class="flextaillepage2">
                <img class="limitationimgpage2" src="images/5.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

        </div>
        <div class="page2flex">

            <div class="flextaillepage2" >
                <img class="limitationimgpage2" src="images/13.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

            <div class="flextaillepage2">
                <div class="centrerflexpage2">
                    <div>
                        <div class="flexgalerie">
                            <div class="petittxtgalerie2 Roboto" > Réserver l'appartement de vos rêves </div>
                            <div class="flexflexgalerie">
                                <div class="barregalerie"></div>
                            </div>
                        </div>
                        <div class="txtgalerie Roboto decalementgachepage2" >DESCRIPTION </div>
                        <div class="txtgalerie Roboto" >DE LA SUITE</div>
                        <a href="../descriptionsuite/descriptionsuite.php" ><input class="boutongalerie Roboto" type="button" value="VOIR LA DESCRIPTION"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="index3">
        <div class="titreindex3 Roboto">
            TARIFICATIONS
        </div>
        <div class="tarificationp3">

            <div class="mobileindex3">
                <div class="flexindex3">
                    <div class="index3prix">
                        <div class="centerflexindex3">
                            <div class="Roboto">
                                <span class="prixindex3"> 105<sup>€</sup></span><sub class="nuittxt">/nuit</sub>
                            </div>
                            <div class="couleurindex3">
                                    <span class="font40 Roboto"> Basse saison </span>
                                <div>
                                    <span class="font20 Roboto">FAIBLE AFFLUENCE </span>
                                </div>
                            </div>
                            <div class="Roboto decalementtxtindex3">
                                La basse saison est comprise entre le 1 <sup>er</sup> octobre au 31 mars.
                            </div>
                            <input class="boutonindex3 Roboto" type="button" value="RÉSERVER">
                        </div>
                    </div>

                    <div class="separationmobile">
                    </div>
                    
                    <div class="index3prixgrand">
                        <div class="centerflexindex3">
                            <div class="Roboto">
                                <span class="prixindex3">150<sup>€</sup></span><sub class="nuittxt">/nuit</sub>
                            </div>
                            <div class="couleurindex3">
                                    <span class="font40 Roboto">Haute saison</span>
                                <div>
                                    <span class="font20 Roboto">FORTE AFFLUENCE</span>
                                </div>
                            </div>
                            <div class="Roboto decalementtxtindex3">
                            La haute saison est comprise entre le 1<sup>er</sup> juillet au 30 août.
                            </div>
                            <input class="boutonindex3 Roboto" type="button" value="RÉSERVER">
                        </div>
                    </div>
                </div>

                <div class="espacementindex3">
                </div>
                <div class="separationmobile">
                </div>
                
                <div class="mobileindex3">
                    <div class="flexindex3">
                        <div class="index3prixgrand">
                            <div class="centerflexindex3">
                                <div class="Roboto">
                                    <span class="prixindex3">135<sup>€</sup></span><sub class="nuittxt">/nuit</sub>
                                </div>
                                <div class="couleurindex3">
                                        <span class="font40 Roboto">Haute saison</span>
                                    <div>
                                        <span class="font20 Roboto">FORTE AFFLUENCE</span>
                                    </div>
                                </div>
                                <div class="Roboto decalementtxtindex3">
                                La Haute saison est comprise entre Juin et Septembre
                                </div>
                                <input class="boutonindex3 Roboto" type="button" value="RÉSERVER">
                            </div>
                        </div>

                        <div class="separationmobile">
                        </div>

                        <div class="index3prix">
                            <div class="centerflexindex3">
                                <div class="Roboto">
                                    <span class="prixindex3">120<sup>€</sup></span><sub class="nuittxt">/nuit</sub>
                                </div>
                                <div class="couleurindex3">
                                        <span class="font40 Roboto">Moyenne saison</span>
                                    <div>
                                        <span class="font20 Roboto">AFFLUENCE MODÉRÉE</span>
                                    </div>
                                </div>
                                <div class="Roboto decalementtxtindex3">
                                    La Moyenne saison est comprise entre le 1 <sup>er</sup> avril au 31 mai dont 4-5 jours autour du 14 juillet et noël.
                                </div>
                                <input class="boutonindex3 Roboto" type="button" value="RÉSERVER">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="index4">
    <div class="Roboto alignementdroittitre">
            NOUS ECRIRE
        </div>
        <div class="Nous-Ecrire">
            <div class="nsEcrire">
                <div class="container">
                    <form method="post">
                        <p class="centercontainerecrire couleurblanche Roboto" > Vous ne trouvez pas la réponse à votre question, nous somme la, vous pouvez nous envoyer vos questions : </p>
                        <?= $message_envoye ?>
                        <?= $message_formulaire_invalide ?>
                        <?= $message_non_envoye ?>
                        <div class="flexcontainer">
                            <input class="inputindex" type="text" name="prenom" placeholder="Prénom" required>
                            <input class="inputindex espacementflex" type="text" name="nom" placeholder="Nom" required>
                        </div>

                        <div class="flexcontainer">
                            <input class="inputindex" type="email" name="email" placeholder="E-mail" required>
                            <input class="inputindex espacementflex" name="telephone" type="text" placeholder="Numéro de téléhpone" required>
                        </div>

                        <textarea class="inputindex" name="message" placeholder="Votre message ..." required></textarea>

                        <p class="couleurblanche modificationp Roboto"> Tous les champs sont obligatoires </p>

                        <div class="centerbouton">
                            <input class="submitindex Roboto" type="submit" value="ENVOYER !">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

<?php
    include 'footer.php';
    include 'end-html.php'
?>