<?php
include ('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['arquivo']['name'];

    // Caminho do arquivo para salvar o upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($arquivo);

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO projetos (nome, descricao, arquivo) VALUES ('$nome', '$descricao', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo projeto adicionado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Erro ao fazer upload do arquivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Novo Projeto</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header>
        <h1>Adicionar Novo Projeto</h1>
        <nav>
            <ul>
                <li><a href="index.html">Sobre o Projeto</a></li>
                <li><a href="contato.html">Contato</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="cadastro.html">Cadastro</a></li>
            </ul>
            <span class="nav-toggle">☰</span>
        </nav>
    </header>
    <main>
        <form action="adicionar-projeto.php" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome do Projeto:</label>
            <input type="text" id="nome" name="nome" required><br><br>
            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao" rows="4" required></textarea><br><br>
            <label for="arquivo">Adicionar Arquivo:</label>
            <input type="file" id="arquivo" name="arquivo" required><br><br>
            <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div><br>
            <input type="submit" value="Adicionar Projeto">
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Projetos Sociais</p>
    </footer>
    <script src="scripsts.java"></script>
</body>
</html>
