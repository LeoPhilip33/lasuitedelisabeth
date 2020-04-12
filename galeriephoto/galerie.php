<?php
    include '../include/start-html.php';
    include '../navbar/navbar.php';
?>

<div class="margin-top">
    <h1> GALERIE PHOTO </h1>
    <p>Réserver l'appartement de vos rêves</p>
</div>

<div class="wrapper" id="fade-slider">
    <div class="fade-slider-container">
      <div class="fade-slider-row">
        <div class="fade-slider">
          <div class="fade-slider-item showing">1</div>
          <div class="fade-slider-item">2</div>
          <div class="fade-slider-item">3</div>
          <div class="fade-slider-item">4</div>
          <div class="fade-slider-item">5</div>
          <div class="fade-slider-item">6</div>
        </div>
      </div>
      <div class="fade-controls">
        <button class="fade-sl-arrow fade-arrow-prev"><</button>
        <div class="fade-sl-counter">
          <span class="current">0</span><span class="sum">/0</span>
        </div>
        <button class="fade-sl-arrow fade-arrow-next">></button>
      </div>
    </div>
  </div>
    
<script type="text/javascript" src="../js/slideshow.js"></script>

<?php
    include '../include/end-html.php'
?>