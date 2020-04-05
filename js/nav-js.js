var burger = document.querySelector('.icon');
var menu = document.querySelector('.menu-mobile');
burger.onclick = function(){
	burger.classList.toggle('active');
	menu.classList.toggle('active');
}