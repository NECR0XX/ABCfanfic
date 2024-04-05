<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/Css/stylelogin.css">
    <link rel="shortcut icon" href="../Resources/Assets/dex66te-e97d5f90-5c30-4441-aaee-3905f1e2036d.png" type="image/x-icon">
    <script src="../Resources/Js/script.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <header>
            <?php
                if(isset($_SESSION['nao_autenticado'])):
                    echo '<div class="alert">Usuário ou senha inválidos!</div>';
                    unset($_SESSION['nao_autenticado']);
                endif;
            ?>
        </header>
        <h1>Conecte-se</h1>
        <form action="../App/Providers/loginconfig.php" method="post">
            <input type="text" name="email" placeholder="E-mail ou Usuário" required>
            <br>
            <input type="password" name="senha" placeholder="Senha" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <br>
        <a href="cadastro.php">Cadastro</a>
    </div>
</body>
</html>
