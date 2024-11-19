<?php

include '../conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Atualiza os dados da instituição
    $sql = "UPDATE instituicoes SET latitude = ?, longitude = ?, status = 'aprovado' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $latitude, $longitude, $id);
    
    if ($stmt->execute()) {
        echo "Instituição atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar a instituição: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
header("Location: ../gestao.php");
exit();
?>
