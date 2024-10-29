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

