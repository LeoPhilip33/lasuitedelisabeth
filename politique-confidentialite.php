<?php
    include 'start-html.php';
?>

<nav>
    <div class="nav_gauche"><strong><a href="index.php">La Suite d'Elisabeth</a></strong></div>
    <div class="nav_droit">
        <div class="nav_droit_div"><a href="index.php">ACCUEIL</a></div>
        <div class="nav_droit_div"><a href="galerie.php">GALERIE PHOTOS</a></div>
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
        <div class="menuMclass"><a class="couleurnavmobile" href="index.php">ACCUEIL</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="galerie.php">GALERIE PHOTOS</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="reserver.php">RÉSERVER</a></div>
    </div>
</section>

<script type="text/javascript" src="js/nav-js.js"></script>

<div class="margin-top">
  <h1 class="fonttitleglerie Roboto" > Politique de confidentialité </h1>
  <hr class="hrtitle">
  <p class="supporttxttitre Roboto" > Données personnelles et cookies - Conditions générales d'utilisation de notre suite</p>
</div>


<?php
    include 'footer.php';
    include 'end-html.php'
?>