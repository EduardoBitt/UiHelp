var map = L.map('map').setView([-27.63770377332425, -48.651619822297285], 10);


var greenIcon = L.icon({
    iconUrl: 'img/icone.png', // Link do ícone
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png', // Sombra do ícone

    iconSize: [25, 41], // Tamanho do ícone
    iconAnchor: [12, 41], // Ponto onde o ícone estará no mapa
    popupAnchor: [1, -34], // Ponto de ancoragem do popup relativo ao ícone
    shadowSize: [41, 41] // Tamanho da sombra
});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

fetch('dados_instituicoes.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(instituicao => {
            var marker = L.marker([instituicao.latitude, instituicao.longitude], {icon: greenIcon}).addTo(map);
            marker.bindPopup(`
                <div class="popup">
                    <h3>${instituicao.nome}</h3>
                    <p><b>Endereço:</b> ${instituicao.endereco}</p>
                    <p><b>Telefone:</b> ${instituicao.telefone}</p>
                    <p><b>Email:</b> ${instituicao.email}</p>
                    <p><b>Categoria:</b> ${instituicao.categoria}</p>
                    <img src="${instituicao.imagem}" alt="Imagem do local" style="width:150px;height:auto;">
                </div>
            `);
        });
    })
    .catch(error => console.error('Erro ao carregar os dados:', error));

// animação do menu
const hamburger = document.getElementById('hamburger');
const menu = document.getElementById('menu');

hamburger.addEventListener('click', () => {
    if (menu.classList.contains('closed')) {
        menu.classList.remove('closed');
        menu.classList.add('open');
    } else {
        menu.classList.remove('open');
        menu.classList.add('closed');
    }
});
