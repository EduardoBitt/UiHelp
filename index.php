<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UiHelp</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="map"></div>

    <script src="map.js"></script>


    <!-- Ícone de menu hamburger -->
    <div class="hamburger" id="hamburger">
        <img src="img/logo.png" alt="logo">
    </div>

    <!-- Menu lateral -->
    <div id="menu" class="menu closed">
        <h2 class="menu-title">Filtros</h2>

        <!-- Filtros do menu -->
        <div class="filtros">
            <label class="filter-option">
                <input type="radio" name="filter" value="todos" checked>
                <label>Todos</label>
            </label>
            <label class="filter-option">
                <input type="radio" name="filter" value="roupas">
                <label>Roupas</label>
            </label>
            <label class="filter-option">
                <input type="radio" name="filter" value="moveis">
                <label>Móveis</label>
            </label>
            <label class="filter-option">
                <input type="radio" name="filter" value="brinquedos">
                <label>Brinquedos</label>
            </label>
            <label class="filter-option">
                <input type="radio" name="filter" value="alimentos">
                <label>Alimentos</label>
            </label>
            <label class="filter-residuo">
                <input type="radio" name="filter" value="residuos">
                <label>Resíduos</label>
            </label>
        </div>

        <!-- Botão de inscrição -->
        <div class="inscricao">
            <a href="cadastro.php" target="_blank" class="inscrever-btn">Inscreva sua Instituição</a>
        </div>

        <!-- Seção de contato -->
        <div class="contato">
            <p>Nos Contate!</p>
            <div class="contact-icons">
                <a href="https://www.instagram.com/ui.help/" target="_blank">
                    <img src="img/instagram.png" alt="Instagram" class="icon">
                </a>
                <a href="" target="_blank">
                    <img src="img/whatsapp.png" alt="WhatsApp" class="icon">
                </a>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menu = document.getElementById("menu");
            const hamburger = document.getElementById("hamburger");

            // Alterna entre aberto e fechado ao clicar no ícone
            hamburger.addEventListener("click", function() {
                menu.classList.toggle("open");
                menu.classList.toggle("closed");
            });
        });
    </script>



</body>
</html>
