<?php
// Incluir o arquivo de conexão
include 'conexao.php';

// Processar os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $categoria = $_POST['categoria'];

    // Processar a imagem
    $imagem = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $diretorio = "uploads/"; // Diretório onde as imagens serão salvas
    $caminho_imagem = $diretorio . basename($imagem);

    // Mover a imagem para o diretório
    if (move_uploaded_file($imagem_temp, $caminho_imagem)) {
        // Inserir os dados no banco de dados
        $sql = "INSERT INTO instituicoes (cnpj, nome, endereco, telefone, email, imagem, categoria) VALUES ('$cnpj', '$nome', '$endereco', '$telefone', '$email', '$caminho_imagem', '$categoria')";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}

$conn->close();
?>
