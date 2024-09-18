var map = L.map('map').setView([-27.63770377332425, -48.651619822297285], 10);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


const hamburger = document.getElementById('hamburger');
const closebtn = document.getElementById('closebtn');
const menu = document.getElementById('menu');

hamburger.addEventListener('click', () => {
    menu.classList.add('open');
});

closebtn.addEventListener('click', () => {
    menu.classList.remove('open');
});