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

$fanfics = $fanficController->listarFanfics();
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
        <h1>Fanfic</h1>
    </header>
    
    <form action="post.php" method="post" enctype="multipart/form-data">
        <input type="file" name="imagem" accept="image/*" required>
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="text" cols="30" rows="10" placeholder="Escreva aqui sua fanfic!" required></textarea>
        <button type="submit">Adicionar fanfic</button>
    </form>

    <?php
        $fanficController->exibirListaFanfics();
    ?>
</body>
</html>
