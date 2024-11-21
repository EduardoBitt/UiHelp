<?php

include 'conexao.php';

// Processa os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $categoria = $_POST['categoria'];
    $horario_abertura = $_POST['horario_abertura'];
    $horario_fechamento = $_POST['horario_fechamento'];
    $instagram = $_POST['instagram'] ?? null;
    $whatsapp = $_POST['whatsapp'] ?? null;

    // Processa a imagem
    $imagem = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $diretorio = "uploads/"; // Diretório onde as imagens serão salvas
    $caminho_imagem = $diretorio . basename($imagem);

    // Move a imagem para o diretório
    if (move_uploaded_file($imagem_temp, $caminho_imagem)) {
        // Inserir os dados no banco de dados
        $sql = "INSERT INTO instituicoes 
                (cnpj, nome, endereco, telefone, email, imagem, categoria, horario_abertura, horario_fechamento, instagram, whatsapp) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";;

                // Prepara a consulta
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Associa os valores às variáveis
            $stmt->bind_param("sssssssssss", 
                $cnpj, 
                $nome, 
                $endereco, 
                $telefone, 
                $email, 
                $caminho_imagem, 
                $categoria, 
                $horario_abertura, 
                $horario_fechamento, 
                $instagram, 
                $whatsapp
            );

            // Executa a consulta
            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            // Fecha o statement
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $conn->error;
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}

$conn->close();
?>
