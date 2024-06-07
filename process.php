<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida e limpa os dados recebidos
    $name = isset($_POST["name"]) ? (is_array($_POST["name"]) ? array_map('htmlspecialchars', $_POST["name"]) : htmlspecialchars($_POST["name"])) : '';
    $phone = isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : '';
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $address = isset($_POST["address"]) ? htmlspecialchars($_POST["address"]) : '';
    $experience = isset($_POST["experience"]) ? array_map('htmlspecialchars', $_POST["experience"]) : [];
    $references = isset($_POST["reference"]) ? array_map('htmlspecialchars', $_POST["reference"]) : [];
    $sobre = isset($_POST["sobre"]) ? implode("<br>", array_map('htmlspecialchars', $_POST["sobre"])) : '';

    // Processamento da imagem
    $imagePath = '';
    if (isset($_FILES['image']['error']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileName = htmlspecialchars($_FILES['image']['name']);
        $uploadDir = './uploaded_files/';
        $imagePath = $uploadDir . $fileName;
        // Verifica se o diretório de destino existe, se não, cria-o
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        // Move o arquivo carregado para o diretório de destino
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // Imagem movida com sucesso
        } else {
            // Erro ao mover a imagem
            echo "Erro ao mover a imagem.";
            exit();
        }
    }

    // Calcula a idade a partir da data de nascimento
    $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : '';
    $birthdateObj = new DateTime($birthdate);
    $today = new DateTime();
    $age = $birthdateObj->diff($today)->y;

    // Gera o currículo em HTML
    $curriculo = "
    <html>
    <head>
        <title>Currículo de $name</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #007bff;
                margin-bottom: 20px;
            }
            p {
                margin-bottom: 10px;
            }
            h2 {
                color: #007bff;
                margin-top: 30px;
            }
            ul {
                list-style-type: none;
                padding-left: 0;
            }
            li::before {
                content: '•';
                color: #007bff;
                display: inline-block;
                width: 1em;
                margin-left: -1em;
            }
            img.profile-image {
                max-width: 150px;
                border-radius: 50%;
                margin-bottom: 20px;
            }
            .print-button {
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .print-button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>$name</h1>
            <img src='$imagePath' alt='Foto de $name' class='profile-image'>
            <p><strong>Idade:</strong> $age anos</p>
            <p><strong>Data de Nascimento:</strong> $birthdate</p>
            <p><strong>Telefone:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Endereço:</strong> $address</p>
            <p><strong>Sobre:</strong> $sobre</p>
            
            <h2>Experiência Profissional</h2>
            <ul>";
    foreach ($experience as $exp) {
        $curriculo .= "<li>$exp</li>";
    }
    $curriculo .= "</ul>";

    $curriculo .= "
            <h2>Referências Pessoais</h2>
            <ul>";
    foreach ($references as $ref) {
        $curriculo .= "<li>$ref</li>";
    }
    $curriculo .= "
            </ul>
            <button class='print-button' onclick='window.print()'>Imprimir</button>
        </div>
    </body>
    </html>";

    // Retorna o currículo como resposta
    header("Content-Type: text/html");
    echo $curriculo;
    exit();
}
?>
