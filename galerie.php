<?php
    include 'start-html.php';
?>

<nav>
    <div class="nav_gauche"><strong><a href="index.php">La Suite d'Elisabeth</a></strong></div>
    <div class="nav_droit">
        <div class="nav_droit_div"><a href="index.php">ACCUEIL</a></div>
        <div class="nav_droit_div active"><a href="galerie.php">GALERIE PHOTOS</a></div>
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
        <div class="menuMclass active"><a class="couleurnavmobile" href="galerie.php">GALERIE PHOTOS</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="descriptionsuite.php">DESCRIPTION SUITE</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="calendrier-reservations.php">CALENDRIER RESERVATIONS</a></div>
        <div class="menuMclass"><a class="couleurnavmobile" href="reserver.php">RÉSERVER</a></div>
    </div>
</section>

<script type="text/javascript" src="../js/nav-js.js"></script>


<div class="margin-top">
  <h1 class="fonttitleglerie Roboto" > GALERIE PHOTOS </h1>
  <hr class="hrtitle">
  <p class="supporttxttitre Roboto" >Réservez l'appartement de vos rêves</p>
</div>

<div class="slideshow-container">

    <div class="mySlides fade">
      <img class="dim_img" src="images/1.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/2.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/3.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/4.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/5.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/6.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/7.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/8.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/9.jpg" alt="" >
    </div>

    <div class="mySlides fade">
      <img class="dim_img" src="images/10.jpg" alt="" >
    </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>



<script type="text/javascript" src="/js/slideshow.js"></script>

<hr class="hrgalerie">

<div id="myBtnContainer">
  <button class="btn Roboto all active" onclick="filterSelection('all')"> TOUT AFFICHER </button>
  <button class="btn Roboto salon" onclick="filterSelection('salon')"> SALON </button>
  <button class="btn Roboto cuisine" onclick="filterSelection('cuisine')"> CUISINE </button>
  <button class="btn Roboto chambre" onclick="filterSelection('chambre')"> CHAMBRE </button>
  <button class="btn Roboto sdb" onclick="filterSelection('sdb')"> SALLE DE BAIN </button>
  <button class="btn Roboto vers" onclick="filterSelection('vers')"> VERRIÈRE SALON </button>
  <button class="btn Roboto terrasse" onclick="filterSelection('terrasse')"> TERRASSE </button>
</div>

<div class="container2">
  <span class="colorgalerie"> <div class="filterDiv chambre img1">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv sdb img2">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv terrasse img3">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv sdb img4">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv terrasse img5">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv salon img6">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv salon img7">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv sdb img8">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv chambre sdb img9">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv sdb img10">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv salon sdb img11">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv salon chambre img12">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv salon cuisine img13">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv salon cuisine img14">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv cuisine vers img15">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv cuisine img16">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv terrasse img17">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv vers img18">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv vers img19">&nbsp;</div> </span>
  <span class="colorgalerie"> <div class="filterDiv vers img20">&nbsp;</div> </span>
</div>

<script>

filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}






// Carrouhelel

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  }

</script>

<?php
    include 'end-html.php';
    include 'footer.php';
?>