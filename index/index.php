<?php
    include '../navbar/navbar.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../navbar/stylenavbar.css"><!-- navbar style -->
    <link type="text/css" rel="stylesheet" href="../footer/footerstyle.css"><!-- footer style -->
    <link type="text/css" rel="stylesheet" href="styleindex.css"><!-- index style -->
    <title>La Suite d'Elisabeth</title>
</head>
<body>
    <div class="index1">
        <div class="index1_center">
            <h1 class="Allura"> La suite d'Elisabeth </h1>
            <p class="Roboto"> Un appartement de charme situé en plein cœur de la cité médiévale </p>
            <div class="footerpage1">
                <div class="flechedownlabel Roboto"> <a class="aUnstyle" href="#galerieindex" >Découvrir</a></div>
                <div><a href="#galerieindex" ><img class="flecheverslebasindex1" src="../images/arrow-down.png" alt="Fleche vers le bas pour changer de page"></a></div>
            </div>
        </div>
    </div>
    <div class="index2" id="galerieindex">
        <div class="page2flex">

            <div class="flextaillepage2">
                <div class="flexgalerie">
                    <div class="flexflexgalerie" >
                        <div class="barregalerie"></div>
                    </div>
                    <div class="petittxtgalerie Roboto" > Réserver l'appartement de vos rêves </div>
                </div>
                <div class="txtgalerie Roboto" >GALERIE PHOTO</div>
                <a href="#" ><input class="boutongalerie Roboto" type="button" value="VOIR LA GALERIE"></a>
            </div>
            <div class="flextaillepage2">
                <img class="limitationimgpage2" src="../images/1.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

        </div>

        <div class="page2flex">

            <div class="flextaillepage2" >
                <img class="limitationimgpage2" src="../images/20.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

            <div class="flextaillepage2">
                <img class="limitationimgpage2" src="../images/5.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

        </div>
        <div class="page2flex">

            <div class="flextaillepage2" >
                <img class="limitationimgpage2" src="../images/13.jpg" alt="Fleche vers le bas pour changer de page">
            </div>

            <div class="flextaillepage2">
                <div class="flexgalerie">
                    <div class="flexflexgalerie" >
                        <div class="barregalerie"></div>
                    </div>
                    <div class="petittxtgalerie Roboto" > Réserver l'appartement de vos rêves </div>
                </div>
                <div class="txtgalerie Roboto" >GALERIE PHOTO</div>
                <a href="#" ><input class="boutongalerie Roboto" type="button" value="VOIR LA GALERIE"></a>
            </div>

        </div>

    </div>
</body>
</html>
<?php
    include '../footer/footer.php';
?>