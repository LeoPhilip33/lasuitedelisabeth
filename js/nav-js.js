var burger = document.querySelector('.icon');
var menu = document.querySelector('.menu-mobile');
var menuM = document.querySelector('.menuM');

burger.onclick = function(){
	burger.classList.toggle('active');
	menu.classList.toggle('active');
	menuM.classList.toggle('active');
}