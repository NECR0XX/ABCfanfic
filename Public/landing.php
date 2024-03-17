<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/css/style.css">
    <script src="../Resources/Js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                <button id="log" onclick="logout()">Sair</button>
                <h3>Olá <?php echo $_SESSION['usuarioNomedeUsuario'], "!"; ?> </h3>
            <?php else: ?>
                <h3><a href="login.php">conecte-se</a></h3>
        <?php endif; ?>
    </header>
    <section>
        <div class="retangulo">
        <img src="../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
    </div>
        
        <div class="subretangulo"><a href="User/tags.php">Tags</a>
        <a href="User/perfil.php">perfil</a>
        <a href="User/sobre.php">Sobre</a></div>
    </section>
</body>
</html>