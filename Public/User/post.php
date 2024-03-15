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
    isset($_POST['text'])) {

    $fanficController->criarFanfic($imagem, $_POST['titulo'], $_POST['text'], $_SESSION['usuarioNomedeUsuario']);
    header('Location: #');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
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
        <a href="perfil.php">Voltar</a>
        <h1>Fanfic</h1>
    </header>
    <div class="container2">
    <div class="container"><form action="post.php" method="post" enctype="multipart/form-data">
    
    <div class="alinhamento" id="placeholder" onclick="selectImage()">
  <img src="../../Resources/Assets/Uploads/Capa.png" alt="Placeholder">
</div>
<input type="file" id="fileInput" onchange="loadImage(event)" accept="image/*">

<script src="script.js"></script><br>
    <div class="tit">
        <input type="text" name="titulo" placeholder="Título" required class="titi"></div><br>
        <textarea name="text" cols="30" rows="10" placeholder="Escreva aqui sua fanfic!" required class="pi" ></textarea>
        <button class="botao" type="submit">Adicionar fanfic</button>
    </form></div></div>

</body>
</html>
