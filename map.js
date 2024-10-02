var map = L.map('map').setView([-27.63770377332425, -48.651619822297285], 10);

// Define o ícone padrão do Leaflet com a cor verde
var greenIcon = L.icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png', // Ícone verde original
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png', // Sombra do ícone

    iconSize: [25, 41], // Tamanho do ícone
    iconAnchor: [12, 41], // Ponto onde o ícone estará no mapa
    popupAnchor: [1, -34], // Ponto de ancoragem do popup relativo ao ícone
    shadowSize: [41, 41] // Tamanho da sombra
});

// Adiciona o marcador ao mapa
var marker = L.marker([-27.63770377332425, -48.651619822297285], {icon: greenIcon}).addTo(map);
var marker2 = L.marker([-27.891725639381523, -48.58813094723662], {icon: greenIcon}).addTo(map);

marker.bindPopup(`
    <div class="popup">
        <h3>Faculdade Municipal de Palhoça</h3>
        <p><b>Endereço:</b> R. João Pereira dos Santos, 99 - Pte. do Imaruim, Palhoça - SC, 88130-475</p>
        <p><b>Horário de Funcionamento:</b> 08:00–22:00</p>
        <p><b>Visite nosso site:</b> <a href="http://fmpsc.edu.br/" target="_blank">Clique aqui</a></p>
        <a class="instagram" href="https://www.instagram.com/faculdademunicipaldepalhoca/" target="_blank"><img src="img/instagram.png" style="width:30px;height:auto;"></a>
        <img src="img/image.png" alt="Imagem do local" style="width:150px;height:auto;">
    </div>
`);

marker2.bindPopup(`
    <div class="popup">
        <h3>Pró-CREP</h3>
        <p><b>Endereço:</b> R. João Fedoca - Enseada da Pinheira, Palhoça - SC, 88139-367</p>
        <p><b>Horário de Funcionamento:</b><br> Segunda à sexta<br> 08:00-12:00<br>13:30-18:00</p>
        <div class="contatos-mapa">
        <a class="whatsapp" href="https://wa.me/5548999346710" target="_blank"><img src="img/whatsapp.png" style="width:30px;height:auto;"></a>
        <a class="instagram" href="https://www.instagram.com/associacao.procrep/" target="_blank"><img src="img/instagram.png" style="width:30px;height:auto;"></a>
        </div>
        <img src="img/procrep.jpg" alt="Imagem do local" style="width:150px;height:auto;">
    </div>
`);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


//animação do menu
const hamburger = document.getElementById('hamburger');
const closebtn = document.getElementById('closebtn');
const menu = document.getElementById('menu');

hamburger.addEventListener('click', () => {
    menu.classList.add('open');
});

closebtn.addEventListener('click', () => {
    menu.classList.remove('open');
});