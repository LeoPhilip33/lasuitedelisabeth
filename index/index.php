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
                <div class="centrerflexpage2">
                    <div>
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
                <div class="centrerflexpage2">
                    <div>
                        <div class="flexgalerie">
                            <div class="petittxtgalerie2 Roboto" > Réserver l'appartement de vos rêves </div>
                            <div class="flexflexgalerie" >
                                <div class="barregalerie"></div>
                            </div>
                        </div>
                        <div class="txtgalerie Roboto decalementgachepage2" >DESCRIPTION </div>
                        <div class="txtgalerie Roboto" >DE LA SUITE</div>
                        <a href="#" ><input class="boutongalerie Roboto" type="button" value="VOIR LA DESCRIPTION"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="index3">
        <div class="tarificationp3">
            
        </div>
    </div>

    <div class="index4">
        <div class="Nous-Ecrire">
            <div class="nsEcrire">
                <div class="container">
                    <form>
                        <p class="centercontainerecrire couleurblanche Roboto" > Vous ne trouvez pas la réponse à votre question, nous somme la, vous pouvez nous envoyer vos questions : </p>
                        <div class="flexcontainer">
                            <input type="text" name="firstname" placeholder="Prénom">
                            <input class=" espacementflex" type="text" name="sujet" placeholder="Nom">
                        </div>

                        <div class="flexcontainer">
                            <input type="email" placeholder="E-mail">
                            <input class="espacementflex" type="text" placeholder="Numéro de téléhpone">
                        </div>

                        <textarea placeholder="Votre message ..." style="height:200px"></textarea>

                        <p class="couleurblanche modificationp Roboto"> Tous les champs sont obligatoires </p>

                        <div class="centerbouton">
                            <input class="Roboto" type="submit" value="ENVOYER !">
                        </div>
                    </form>
                </div>
            </div>






        </div>
    </div>

</body>
</html>
<?php
    include '../footer/footer.php';
?>