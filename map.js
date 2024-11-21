const overlay = document.getElementById('image-overlay');
const enlargedImage = document.getElementById('enlarged-image');

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

var markers = []; // Array para armazenar os marcadores

// Função para adicionar marcadores ao mapa
function addMarkers(filteredData) {
    // Remove os marcadores existentes
    markers.forEach(marker => map.removeLayer(marker));
    markers = []; // Limpa o array de marcadores

    filteredData.forEach(instituicao => {
        var marker = L.marker([instituicao.latitude, instituicao.longitude], {icon: greenIcon}).addTo(map);
        marker.bindPopup(`
            <div class="popup">
                <h3>${instituicao.nome}</h3>
                <p><b>Endereço:</b> ${instituicao.endereco}</p>
                <p><b>Telefone:</b> ${instituicao.telefone}</p>
                <p><b>Email:</b> ${instituicao.email}</p>
                <p><b>Categoria:</b> ${instituicao.categoria}</p>
                <p><b>Horário:</b> ${instituicao.horario_abertura} até ${instituicao.horario_fechamento}</p>
                <div class="contatos-mapa">
                    <a class="whatsapp" href="https://wa.me/${instituicao.whatsapp}" target="_blank">
                        <img src="img/whatsapp.png" style="width:30px;height:auto;">
                    </a>
                    <a class="instagram" href="${instituicao.instagram}" target="_blank">
                        <img src="img/instagram.png" style="width:30px;height:auto;">
                    </a>
                </div>
                <img src="${instituicao.imagem}" alt="Imagem do local" style="width:150px;height:auto; cursor:pointer;" class="popup-image">
            </div>
        `);
        markers.push(marker); // Adiciona o marcador ao array
    });
}

// Carregar dados das instituições
fetch('dados_instituicoes.php')
    .then(response => response.json())
    .then(data => {
        addMarkers(data); // Exibe todas as instituições inicialmente

        // Filtragem com base na seleção do filtro
        const filters = document.querySelectorAll('input[name="filter"]');
        filters.forEach(filter => {
            filter.addEventListener('change', function() {
                const selectedCategory = this.value;
                if (selectedCategory === 'todos') {
                    addMarkers(data); // Exibe todas as instituições
                } else {
                    const filteredData = data.filter(instituicao => instituicao.categoria === selectedCategory);
                    addMarkers(filteredData); // Exibe apenas as instituições da categoria selecionada
                }
            });
        });
    })
    .catch(error => console.error('Erro ao carregar os dados:', error));

// Evento global para capturar cliques nas imagens do popup
document.addEventListener('click', (event) => {
    if (event.target.classList.contains('popup-image')) {
        // Atualiza a imagem no overlay e exibe o modal
        enlargedImage.src = event.target.src;                   
        overlay.classList.remove('closed');
        overlay.classList.add('open');
    }
});

// Fecha o overlay ao clicar fora da imagem
overlay.addEventListener('click', (event) => {
    if (event.target === overlay) {
        overlay.classList.remove('open');
        overlay.classList.add('closed');
    }
});

// Animação do menu
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
