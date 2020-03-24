<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$objet = $_POST['objet'];
$message = $_POST['message'];
/*
********************************************************************************************
CONFIGURATION
********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer ? plusieurs ? la fois, s?parez-les par une virgule
$destinataire = 'guillaumemengelatte@hotmail.fr';

// copie ? (envoie une copie au visiteur)
$copie = 'oui'; // 'oui' ou 'non'

/*
********************************************************************************************
FIN DE LA CONFIGURATION
********************************************************************************************
*/

// on teste si le formulaire a ?t? soumis
if (isset($_POST['envoyer']))
{
// formulaire non envoy?
    $message_erreur_formulaire = "<p style='color:red;'> Vous devez d'abord envoyer le formulaire. </p>";
}
else
{
/*
    * cette fonction sert ? nettoyer et enregistrer un texte
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
    * Cette fonction sert ? v?rifier la syntaxe d'un email
    */
function IsEmail($email)
{
    $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
    return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoy?, on r?cup?re tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$prenom  = (isset($_POST['prenom']))  ? Rec($_POST['prenom'])  : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

// On va v?rifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erron?, soit il vaut l'email entr?

if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
{
    // les 4 variables sont remplies, on g?n?re puis envoie le mail
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From:'.$nom.' Léo le plus beau '.$prenom.' <'.$email.'>' . "\r\n" .
            'Reply-To:'.$email. "\r\n" .
            'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
            'Content-Disposition: inline'. "\r\n" .
            'Content-Transfer-Encoding: 7bit'." \r\n" .
            'X-Mailer:PHP/'.phpversion();

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

    $objet = html_entity_decode($objet);
    $objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);

    $message = html_entity_decode($message);
    $message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

    // Envoi du mail
    $num_emails = 0;
    $tmp = explode(';', $cible);
    foreach($tmp as $email_destinataire)
    {
      if (mail($email_destinataire, $objet, $message, $headers))
          $num_emails++;
    }

    if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
    {
        $message_envoye = "<p style='color:green;'> Votre message a bien été envoyé ! </p>";
    }
    else
    {
        $message_non_envoye = "<p style='color:red;> L'envoi du mail a échoué, veuillez réessayer. <p>";
    };
}
else
{
    $message_formulaire_invalide = "<p style='color:red;'>Vérifier que tous les champs soient bien remplis et que l'email soit sans erreur. </p>";
};
}; // fin du if (!isset($_POST['envoi']))

}
?>

<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>MeetMe Personal</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>

        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><font color = "white" size = "+2" face = "Comic sans MS">MG</font> </a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="index.html">Accueil</a></li>
                                <li class="nav-item"><a class="nav-link" href="portfolio.html">Portfolio</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php"><img src="img/gallery/DrapeauFR.jpg" id="flag"></a></li>
								<li class="nav-item"><a class="nav-link" href="contactEN.php"><img src="img/gallery/DrapeauEN.png" id="flag"></a></li>
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="box_1620">
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h2>Me Contacter</h2>
							<div class="page_link">
								<a href="index.html">Accueil</a>
								<a href="contact.html">Me Contacter</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Contact Area =================-->

         <section class="contact_area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Nouvelle-Aquitaine, Fance</h6>
                                <p>La Sauve-Majeur</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a>guillaumemengelatte@hotmail.fr</a></h6>
                                <p>Réponse dans les plus brefs délais</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form method="POST" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text"  class="form-control" name="nom" placeholder="Votre Nom" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Adresse Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="objet" placeholder="Objet" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Votre message ..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <?= $message_envoye ?>
                                    <?= $message_non_envoye ?>
                                    <?= $message_formulaire_invalide ?>
                                    <?= $message_erreur_formulaire ?>
                                    <button type="submit" value="ok" class="btn btn-primary" style="float:right;">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>  
        <!--================Contact Area =================-->

  <!--================Footer Area =================-->
  <footer class="footer_area p_120">
    <div class="container">
        <div class="row footer_inner">
            <div class="col-lg-5 col-sm-6">
                <aside class="f_widget ab_widget">
                    <div class="f_title">
                        <h3>About Me</h3>
                    </div>
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </aside>
            </div>

            <div class="col-lg-2">
                <aside class="f_widget social_widget">
                    <div class="f_title">
                        <h3>Suivez Moi</h3>
                    </div>
                    <p>Retrouvez moi ici:</p>
                    <ul class="list">
                        <li><a href="https://www.facebook.com/profile.php?id=100001895614575" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/guillaume-mengelatte-b88394192" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UC_GqkJpZypTYZeIW1yucy7Q?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

        <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Merci</h2>
                        <p>Message Envoyé...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Désolé !</h2>
                        <p> Erreur </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
