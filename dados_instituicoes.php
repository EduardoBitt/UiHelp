<?php
header('Content-Type: application/json');

include 'conexao.php';

// Consultar dados das instituições com latitude e longitude
$sql = "SELECT id, nome, endereco, telefone, email, categoria, imagem, latitude, longitude FROM instituicoes WHERE latitude IS NOT NULL AND longitude IS NOT NULL";
$result = $conn->query($sql);

$instituicoes = array();

// Verificar se há registros
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $instituicoes[] = $row;
    }
}

// Retornar os dados em formato JSON
echo json_encode($instituicoes);

$conn->close();
?>
