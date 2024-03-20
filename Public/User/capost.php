<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/CapController.php';

$capController = new CapController($pdo);

if (!isset($_GET['fanfic_id'])) {
    echo "Parâmetro 'fanfic_id' não foi fornecido.";
    exit();
}

$fanfic_id = $_GET['fanfic_id'];


if (isset($_POST['cap']) && 
    isset($_POST['titulo']) && 
    isset($_POST['texto']) &&
    isset($fanfic_id)) {

    $capController->criarCap($_POST['cap'], $_POST['titulo'],  $_POST['texto'], $fanfic_id);
    header('Location: #');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="shortcut icon" href="Public/Assets/_31554896-b491-466e-b129-d77e088c3b0c-removebg-preview.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="perfil.php">Voltar</a>
        <h1>capitulos</h1>
    </header>
    
    <form method="post">
        <input type="texto" name="cap" placeholder="Capítulo" value="Capítulo " required>
        <input type="texto" name="titulo" placeholder="Título" required>
        <textarea name="texto" cols="30" rows="10" placeholder="Escreva aqui sua história!" required></textarea>
        <button type="submit">Adicionar Cap</button>
    </form>
</body>
</html>