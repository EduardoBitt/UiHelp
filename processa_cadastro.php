<?php
header('Content-Type: application/json');

include 'conexao.php';

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

    // Verifica se o CNPJ já está aprovado
    $sql_verifica = "SELECT * FROM instituicoes WHERE cnpj = ? AND status = 'aprovado'";
    $stmt_verifica = $conn->prepare($sql_verifica);
    $stmt_verifica->bind_param("s", $cnpj);
    $stmt_verifica->execute();
    $resultado = $stmt_verifica->get_result();

    if ($resultado->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Instituição já cadastrada"]);
        exit; // Interrompe o restante do processamento
    }

    $stmt_verifica->close();

    // Processa a imagem
    $imagem = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $diretorio = "uploads/";
    $caminho_imagem = $diretorio . basename($imagem);

    if (move_uploaded_file($imagem_temp, $caminho_imagem)) {
        $sql = "INSERT INTO instituicoes 
                (cnpj, nome, endereco, telefone, email, imagem, categoria, horario_abertura, horario_fechamento, instagram, whatsapp) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
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

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Cadastro realizado com sucesso!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Erro ao cadastrar: " . $stmt->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao preparar a consulta: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Erro ao fazer upload da imagem."]);
    }
}

$conn->close();
?>
