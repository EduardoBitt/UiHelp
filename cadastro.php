<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="cadastro">

    <form id="cnpjForm" action="processa_cadastro.php" method="POST" enctype="multipart/form-data">
        <h1>Cadastre Sua Instituição</h1>
        
        <label for="cnpjInput">CNPJ</label>
        <input type="text" name="cnpj" id="cnpjInput" maxlength="18" placeholder="Digite o CNPJ" required>
        
        <label for="nome">Nome da Instituição</label>
        <input type="text" name="nome" id="nome" placeholder="Nome" required>
        
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" required>
        
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email"required>

        <label for="horario_abertura">Horário de Abertura:</label>
        <input type="time" name="horario_abertura" id="horario_abertura" required>

        <label for="horario_fechamento">Horário de Fechamento:</label>
        <input type="time" name="horario_fechamento" id="horario_fechamento" required>

        <label for="whatsapp">Whatsapp</label>
        <input type="whatsapp" name="whatsapp" placeholder="Whatsapp" id="whatsapp">

        <label for="instagram">Instagram</label>
        <input type="instagram" name="instagram" placeholder="Instagram" id="instagram">

        <label for="imagem">Imagem da Instituição</label>
        <input type="file" name="imagem" id="imagem">
        
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" required>
            <option value="roupas">Roupas</option>
            <option value="moveis">Móveis</option>
            <option value="brinquedos">Brinquedos</option>
            <option value="alimentos">Alimentos</option>
            <option value="residuos">Residuos</option>
        </select>

        <button type="submit" id="submit-btn">Enviar</button>

        <p id="status-cadastro"></p>
    </form>


    <script src="script.js"></script>
</body>
</html>
