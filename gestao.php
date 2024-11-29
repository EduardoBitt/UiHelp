<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Instituições</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body-admin">

    <form action="logout.php" method="POST">
        <button type="submit" class="logout-button">Sair</button>
    </form>
    
    
    <h1 class="titulo-admin">Gerenciamento de Instituições</h1>

    <!-- Botões para alternar entre pendentes e aprovadas -->
    <div class="selecao-tabelas">
        <button onclick="mostrarTabela('pendentes')">Pendentes</button>
        <button onclick="mostrarTabela('aprovadas')">Aprovadas</button>
    </div>

    <!-- Tabela de Instituições Pendentes -->
    <div id="pendentes" class="tabela" style="display: block;">
        <h2>Instituições Pendentes</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>CNPJ</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Horario Abertura</th>
                    <th>Horario Fechamento</th>
                    <th>Instagram</th>
                    <th>Whatsapp</th>
                    <th>Imagem</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                if (!isset($_SESSION['autenticado'])) {
                    header("Location: login.php");
                    exit;
                }

                include 'conexao.php';
                $sql_pendentes = "SELECT * FROM instituicoes WHERE status = 'pendente'";
                $result_pendentes = $conn->query($sql_pendentes);

                if ($result_pendentes->num_rows > 0) {
                    while ($row = $result_pendentes->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['cnpj'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['endereco'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['horario_abertura'] . "</td>";
                        echo "<td>" . $row['horario_fechamento'] . "</td>";
                        echo "<td>" . $row['instagram'] . "</td>";
                        echo "<td>" . $row['whatsapp'] . "</td>";
                        echo "<td><img src='" . $row['imagem'] . "' width='100' alt='Imagem'></td>";
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "<td>";
                        echo "<button class='aprovar-instituicao' onclick='abrirModal(" . $row['id'] . ")'>Aprovar</button>";
                        echo "<a href='excluir/excluir_instituicao_pendente.php?id=" . htmlspecialchars($row['id']) . "' onclick=\"return confirm('Tem certeza que deseja reprovar esta instituição?');\">";
                        echo "<button class='reprovar-instituicao' type='button'>Reprovar</button>";
                        echo "</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Nenhuma instituição pendente encontrada</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Tabela de Instituições Aprovadas -->
    <div id="aprovadas" class="tabela" style="display: none;">
        <h2>Instituições Aprovadas</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Categoria</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_aprovadas = "SELECT * FROM instituicoes WHERE status = 'aprovado'";
                $result_aprovadas = $conn->query($sql_aprovadas);

                if ($result_aprovadas->num_rows > 0) {
                    while ($row = $result_aprovadas->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['endereco']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['imagem']) . "' alt='Imagem da Instituição' style='width:100px; height:auto;'></td>";
                        echo "<td><a href='excluir/excluir_instituicao_aprovada.php?id=" . htmlspecialchars($row['id']) . "' onclick=\"return confirm('Tem certeza que deseja excluir esta instituição?');\">";
                        echo "<button class='excluir-instituicao' type='button'>excluir</button>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Nenhuma instituição aprovada encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para Aprovação -->
    <div id="modalForm" class="modal">
        <form action="aprovar/aprovar_instituicao.php" method="POST">
            <span class="modal-close">&times;</span>
            <h2>Adicionar Latitude e Longitude</h2>
            <input type="hidden" name="id" id="instituicaoId">
            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" id="latitude" required>
            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" required>
            <button type="submit">Aprovar</button>
        </form>
    </div>

    <script src="script.js"></script>

    <script>
        function mostrarTabela(tabela) {
            document.getElementById('pendentes').style.display = (tabela === 'pendentes') ? 'block' : 'none';
            document.getElementById('aprovadas').style.display = (tabela === 'aprovadas') ? 'block' : 'none';
        }
    </script>

</body>
</html>
