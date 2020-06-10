<?php
    include 'start-html.php';
?>
    
    <nav>
        <div class="nav_gauche"><strong><a href="index.php">La Suite d'Elisabeth</a></strong></div>
        <div class="nav_droit">
            <div class="nav_droit_div"><a href="index.php">ACCUEIL</a></div>
            <div class="nav_droit_div"><a href="galerie.php">GALERIE PHOTOS</a></div>
            <div class="nav_droit_div"><a href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
            <div class="nav_droit_div active"><a href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
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
            <div class="menuMclass active"><a class="couleurnavmobile" href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
            <div class="menuMclass"><a class="couleurnavmobile" href="reserver.php">RÉSERVER</a></div>
        </div>
    </section>

    <script type="text/javascript" src="js/nav-js.js"></script>

    <div class="margin-top">
        <h1 class="fonttitleCALENDRIER Roboto" > CALENDRIER DES RÉSERVATIONS </h1>
        <hr class="hrtitle">
        <p class="supporttxttitre Roboto"> Dans cette section vous retrouverez toutes les réservations déjà effectuées par les autres utilisateurs. <br> <br>
        Après avoir repéré des dates de réservation libres, il vous est possible d'aller dans la section <u> <a href="reserver.php">réserver</a></u> afin d'en faire la demande.
        </p>
    </div>

    <div class="calendar-reservation">
        <iframe class="iframe-calendar" src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FParis&amp;src=amRyZzFpMmVrbmNtdTU1YjY1b3MxbXAwMGI0djYybzJAaW1wb3J0LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;src=MWsxdG9jNDQ5a3RmZHFvcXUzb3E1czdhNWo3a20zOXJAaW1wb3J0LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23D6AE00&amp;color=%23515151&amp;showTz=1&amp;showCalendars=0&amp;showTitle=0&amp;showNav=1&amp;showDate=1&amp;showPrint=0&amp;showTabs=0" style="border-width:0" width="550" height="450" frameborder="0" scrolling="no"></iframe>
    </div>



<?php
    include 'end-html.php';
    include 'footer.php';
?>