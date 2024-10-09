// Função para validar CNPJ usando a API ReceitaWS
async function validarCNPJ(cnpj) {
    try {
        const response = await fetch(`https://www.receitaws.com.br/v1/cnpj/${cnpj}`);

        if (response.ok) {
            const data = await response.json();
            return data.status === 'OK'; // Verifica se o CNPJ é válido
        } else {
            console.error('Erro na consulta da API:', response.status);
            return false;
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        return false;
    }
}

function formatarCNPJ(cnpj) {
    // Remove tudo que não for número
    cnpj = cnpj.replace(/\D/g, '');

    // Adiciona a formatação do CNPJ: ##.###.###/####-##
    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2");
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2");
    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2");

    return cnpj;
}

const cnpjInput = document.getElementById('cnpjInput');

cnpjInput.addEventListener('input', function () {
    this.value = formatarCNPJ(this.value);
});

document.addEventListener('DOMContentLoaded', function() {
    const addHorarioButton = document.getElementById('addHorario');
    const horariosContainer = document.getElementById('horariosContainer');

    // Função para adicionar novos campos de horário
    addHorarioButton.addEventListener('click', function() {
        const novoHorario = document.createElement('div');
        novoHorario.classList.add('horario');
        novoHorario.innerHTML = `
            <select class="dia-da-semana">
                <option value="segunda">Segunda</option>
                <option value="terca">Terça</option>
                <option value="quarta">Quarta</option>
                <option value="quinta">Quinta</option>
                <option value="sexta">Sexta</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
            </select>
            <input type="time" class="horario-abertura" required>
            <input type="time" class="horario-fechamento" required>
            <button type="button" class="remove-horario">Remover</button>
        `;
        horariosContainer.appendChild(novoHorario);

        // Adicionar evento para remover o horário
        novoHorario.querySelector('.remove-horario').addEventListener('click', function() {
            horariosContainer.removeChild(novoHorario);
        });
    });
});



// Evento de envio do formulário
const form = document.getElementById('cnpjForm');
form.addEventListener('submit', async function (event) {
    event.preventDefault();
    const cnpjInput = document.getElementById('cnpjInput');
    const cnpj = cnpjInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    const respostaCNPJ = document.getElementById('resposta')

    if (await validarCNPJ(cnpj)) {
        respostaCNPJ.innerHTML = 'CNPJ Válido! ✔'
    } else {
        respostaCNPJ.innerHTML = 'CNPJ não existente! ❌'
    }
});

