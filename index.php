<!DOCTYPE html>
<html lang="pt-BR">

<head>
    
    <meta charset="UTF-8">
    <!-- Define o conjunto de caracteres do documento como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configura a viewport para permitir um design responsivo -->
    <title>Formulário de Dados Pessoais</title>
    <!-- Define o título da página -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link para o arquivo CSS externo que contém os estilos da página -->
</head>

<body>
    <div class="container">
        <!-- Contêiner principal para o formulário -->
        <h1>Formulário de Dados Pessoais</h1>
        <!-- Cabeçalho do formulário -->
        <form action="process.php" method="POST" enctype="multipart/form-data" id="data-form">
            <!-- Início do formulário, que envia os dados para "process.php" usando o método POST -->
            <!-- O atributo enctype="multipart/form-data" é necessário para envio de arquivos -->
            <div class="form-group">
                <!-- Grupo de formulário para o campo Nome -->
                <label for="name">Nome:</label>
                <!-- Rótulo para o campo Nome -->
                <input type="text" id="name" name="name" required>
                <!-- Campo de texto para o nome, com o atributo "required" -->
            </div>
            <div class="form-group">
                <!-- Grupo de formulário para o campo Data de Nascimento -->
                <label for="birthdate">Data de Nascimento:</label>
                <!-- Rótulo para o campo Data de Nascimento -->
                <input type="date" id="birthdate" name="birthdate" required>
                <!-- Campo de data para a data de nascimento, com o atributo "required" -->
            </div>
            <div class="form-group">
                <!-- Grupo de formulário para o campo Telefone -->
                <label for="phone">Telefone:</label>
                <!-- Rótulo para o campo Telefone -->
                <input type="tel" id="phone" name="phone" placeholder="Telefone" required>
                <!-- Campo de telefone, com o atributo "required" e um texto de dica -->
            </div>
            <div class="form-group">
                <!-- Grupo de formulário para o campo Email -->
                <label for="email">Email:</label>
                <!-- Rótulo para o campo Email -->
                <input type="email" id="email" name="email" placeholder="Email" required>
                <!-- Campo de email, com o atributo "required" e um texto de dica -->
            </div>
            <div class="form-group">
                <!-- Grupo de formulário para o campo Endereço -->
                <label for="address">Endereço:</label>
                <!-- Rótulo para o campo Endereço -->
                <input type="text" id="address" name="address" placeholder="Endereço">
                <!-- Campo de texto para o endereço -->
            </div>
            <div class="form-group" id="experience-section">
                <!-- Grupo de formulário para o campo Experiência Profissional -->
                <label for="experience">Experiência Profissional:</label>
                <!-- Rótulo para o campo Experiência Profissional -->
                <div id="experience-fields">
                    <!-- Contêiner para campos dinâmicos de experiência -->
                    <input type="text" name="experience[]" placeholder="Experiência Profissional" required>
                    <!-- Campo de texto para experiência, com o atributo "required" -->
                </div>
                <button type="button" id="add-experience">Adicionar Experiência</button>
                <!-- Botão para adicionar mais campos de experiência -->
            </div>
            <div class="form-group" id="reference-section">
                <!-- Grupo de formulário para o campo Referências Pessoais -->
                <label for="references">Referências Pessoais:</label>
                <!-- Rótulo para o campo Referências Pessoais -->
                <div id="reference-fields">
                    <!-- Contêiner para campos dinâmicos de referência -->
                    <input type="text" name="reference[]" placeholder="Referência Pessoal" required>
                    <!-- Campo de texto para referência com o atributo "required" -->
                </div>
                <button type="button" id="add-reference">Adicionar Referência</button>
                <!-- Botão para adicionar mais campos de referência -->
            </div>
            <div class="form-group">
                <!-- Grupo de formulário para o campo Imagem -->
                <label for="image">Imagem:</label>
                <!-- Rótulo para o campo Imagem -->
                <input type="file" id="image" name="image">
                <!-- Campo de upload de arquivo para a imagem -->
            </div>
            <div class="form-group" id="sobrem-mim">
                <label for="about">Sobre:</label>
                <textarea id="about" name="sobre[]" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
                <!-- Grupo de formulário para o botão de envio -->
                <button type="submit">Enviar</button>
                <!-- Botão de envio do formulário -->
             
            </div>
        </form>
    </div>
   

    <script src="js/script.js"></script>
    <!-- Link para o arquivo JavaScript externo -->
</body>


</html>
