<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/FanficController.php';

if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
    $imagem = "../../Resources/Assets/Uploads/" . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
} else {
    $imagem = "";
}

$fanficController = new FanficController($pdo);

if (isset($_POST['titulo']) && 
    isset($_POST['sinopse']) &&
    isset($_POST['categoria_id'])) {

    $fanficController->criarFanfic($imagem, $_POST['titulo'],  $_POST['sinopse'], $_POST['categoria_id'], $_SESSION['usuarioNomedeUsuario'], $_SESSION['usuarioId']);
    header('Location: #');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/css/stylepost.css">
    <script src="../../Resources/Js/script.js"></script>
    <link rel="shortcut icon" href="Public/Assets/_31554896-b491-466e-b129-d77e088c3b0c-removebg-preview.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <header>
       
    </header>
    
    <div class="container2">
    <div class="container">

        <form action="post.php" method="post" enctype="multipart/form-data">
        <button class="botao-voltar"><a href="perfil.php">⇦Voltar</a></button><br><br>

        <div id="placeholder" onclick="selectImage()">
            <img id="imagePreview" src="../../Resources/Assets/Uploads/Capa.png" alt="Placeholder">
        </div>

        <input type="file" id="fileInput" name="imagem" accept="image/*" style="display: none;" onchange="loadImage(event)" required>

        <script src="script.js"></script><br>
        <div class="tit">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <textarea name="sinopse" cols="30" rows="10" placeholder="Escreva aqui sua sinopse!" required></textarea><br>
        <select name="categoria_id" placeholder="Tags" required>
            <option>Tags...</option>
            <option value="1">Fantasia</option>
            <option value="2">Terror</option>
            <option value="3">Romance</option>
            <option value="4">Drama</option>
            <option value="5">Aventura</option>
            <option value="6">Suspense</option>
            <option value="7">Ação</option>
            <option value="8">Comédia</option>
            <option value="9">Guerra</option>
            <option value="10">Luta</option>
        </select>
        <br>
        <button class="botao" type="submit">Adicionar fanfic</button>
    </form></div></div>
</body>
</html>