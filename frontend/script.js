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

