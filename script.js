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

if (cnpjInput) {
    cnpjInput.addEventListener('input', function () {
        this.value = formatarCNPJ(this.value);
    });
}

// Função para abrir o modal e preencher o ID da instituição
function abrirModal(id) {
    // Exibir o modal
    const modal = document.getElementById("modalForm");
    modal.style.display = "block";

    // Preencher o campo oculto com o ID da instituição
    document.getElementById("instituicaoId").value = id;
}

// Função para fechar o modal
document.querySelector(".modal-close").onclick = function() {
    const modal = document.getElementById("modalForm");
    modal.style.display = "none";
}

// Fechar o modal se o usuário clicar fora do conteúdo do modal
window.onclick = function(event) {
    const modal = document.getElementById("modalForm");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
