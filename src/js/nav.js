let menuToggle = document.querySelector('.menuToggle');
let navEnd = document.querySelector('#nav_end');
let navMenu = document.querySelector('#nav_menu');
menuToggle.onclick = function() {
    navEnd.classList.toggle('active');
    navMenu.classList.toggle('active');
}
