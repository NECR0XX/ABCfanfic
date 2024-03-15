<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/Css/log_cad.css">
    <link rel="shortcut icon" href="../Resources/Assets/dex66te-e97d5f90-5c30-4441-aaee-3905f1e2036d.png" type="image/x-icon">
    <script src="../Resources/Js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            if(isset($_SESSION['nao_autenticado'])):
                echo '<div class="alert">Usuário ou senha inválidos!</div>';
                unset($_SESSION['nao_autenticado']);
            endif;
        ?>
    </header>
    <div class="light"></div>
    <section>
        <h1>ABC fanfic</h1>
        <form action="../App/Providers/loginconfig.php" method="post">
            <input type="text" name="email" placeholder="E-mail ou Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button>Login</button>
        </form>
        <a href="cadastro.php">cadastro</a>
    </section>
</body>
</html>