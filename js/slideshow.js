// Function for Fade-slider

let slides,
    curSlide = 0,
    countValCur,
    countValSum,
    prevBtn,
    nextBtn,
    slInterval = setInterval(nextSlide, 2500);

slides = document.querySelectorAll('.fade-slider-item');
countValCur = document.querySelector('.fade-sl-counter .current');
countValSum = document.querySelector('.fade-sl-counter .sum');
prevBtn = document.querySelector('.fade-arrow-prev');
nextBtn = document.querySelector('.fade-arrow-next');

countValCur.innerHTML = ''+(curSlide + 1)+'';
countValSum.innerHTML = '/'+slides.length+'';

prevBtn.onclick = function() {
  pauseSlideshow();
  prevSlide();
  playSlideshow();
};

nextBtn.onclick = function() {
  pauseSlideshow();
  nextSlide();
  playSlideshow();
};

function nextSlide() {
  changeSlide(curSlide+1);
};

function prevSlide() {
  changeSlide(curSlide-1);
};

function changeSlide(n) {
  slides[curSlide].className = 'fade-slider-item';
  curSlide = (n + slides.length) %slides.length;
  slides[curSlide].className = 'fade-slider-item showing';
  
  countValCur.innerHTML = ''+(curSlide + 1)+'';
  countValSum.innerHTML = '/'+slides.length+'';
};

function pauseSlideshow(){
  clearInterval(slInterval);
};

function playSlideshow(){
  slInterval = setInterval(nextSlide, 2500);
};

// End Fade-slider
