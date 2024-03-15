<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1>Cuzinho 3=======D</h1>
        <a href="User/tags.php">Tags</a><br>
        <a href="User/perfil.php">perfil</a><br>
        <a href="User/sobre.php">Sobre</a>
    </section>
</body>
</html>