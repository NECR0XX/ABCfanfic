<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/css/stylelanding.css">
    <link rel="preconnect" href="https://rsms.me/">
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="../Resources/Js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                <button id="log" onclick="logout()">Sair</button>
                <h3>Olá <?php echo $_SESSION['usuarioNomedeUsuario'], "!"; ?> </h3>
            <?php else: ?>
        <?php endif; ?>
    </header>
    <section>
        <div class="retanguloheader">
        <img src="../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
        <h1>Abc fanfiction</h1>
        <h3><a href="login.php">conecte-se</a></h3>
    </div>
        
        <div class="subretangulo"><a href="User/tags.php">Tags</a>
        <a href="User/perfil.php">Perfil</a>
        <a href="User/sobre.php">Sobre</a></div>
    </section>
</body>
</html>