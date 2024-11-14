<?php
include '../conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM instituicoes WHERE id = ? AND status = 'aprovado'"; //
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Instituição excluída com sucesso!'); window.location.href = '../gestao.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir a instituição.'); window.location.href = '../gestao.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
