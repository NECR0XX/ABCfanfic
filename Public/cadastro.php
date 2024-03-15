<?php
session_start();

require_once '../Config/config.php';
require_once '../App/Controller/LoginController.php';

$loginController = new LoginController($pdo);

if (isset($_POST['nome']) &&
    isset($_POST['email']) &&
    isset($_POST['senha'])) 
    {
    $loginController->criarLogin($_POST['nome'], $_POST['email'], $_POST['senha']);

    $_SESSION['mensagem'] = 'Cadastro realizado com sucesso!';

    header('Location: cadastro.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .alert {
            display: none;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <?php
            if (isset($_SESSION['mensagem'])) {
                echo '<div id="alert" class="alert"><p>' . $_SESSION['mensagem'] . '</p></div>';
                unset($_SESSION['mensagem']);
            }
        ?>
    </header>
    <div class="light"></div>
    <section>
        <h1>ABC fanfic</h1>
        <form method="post">
            <input type="nome" name="nome" placeholder="Usuário" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="login.php">Login</a>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var alertDiv = document.getElementById('alert');
            if (alertDiv) {
                alertDiv.style.display = 'block';
                setTimeout(function () {
                    alertDiv.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
