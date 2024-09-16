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

// Evento de envio do formulário
const form = document.getElementById('cnpjForm');
form.addEventListener('submit', async function (event) {
    event.preventDefault();
    const cnpjInput = document.getElementById('cnpjInput');
    const cnpj = cnpjInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    const respostaCNPJ = document.getElementById('resposta')

    if (await validarCNPJ(cnpj)) {
        respostaCNPJ.innerHTML = 'CNPJ Válido ✔'
    } else {
        respostaCNPJ.innerHTML = 'CNPJ Inválido ❌'
    }
});

