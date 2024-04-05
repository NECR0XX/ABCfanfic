<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/FanficController.php';

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics($_SESSION['usuarioId']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="../../Resources/css/styleperfil.css">
    <link rel="stylesheet" href="../../Resources/css/styleperfilresp.css">
    <title>Perfil</title>
</head>
<body>
    <header>
        <div class="cabpri">
            <div class="logo">
                <img src="../../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
                <h1>Abc fanfiction</h1>
            </div>
            <div class="acess">
                <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <button id="log" onclick="logout()">Sair</button>
                <?php else: ?>
                    <h3><a href="login.php">conecte-se</a></h3>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="cabsec">
            <div class="bots">
                <a href="tags.php">Tags</a>
                <?php
                    if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <a href="perfil.php">perfil</a><br>
                <?php else: ?>
                <?php endif; ?>
                <a href="sobre.php">Sobre</a>
<<<<<<< HEAD
                <a class="procurar" href="search.php">Procurar</a>
=======
>>>>>>> aaa2629730bfee3e76ae74a289924d8f2f9a4497

            </div>
            <div class="search">
                <form id="search-form">
                    <input type="search" id="search-input" placeholder="Pesquise Aqui">
                        <ul id="suggestions"></ul>
                </form>
                    </div>
                <script src="../../Resources/Js/searchuser.js"></script>
            </div>
    </header>   
    <section class="container2">
        <div class="container">
            <button class='voltar'><a href="../landing.php">voltar</a></button>
            <button class='voltar'><a href="favoritos.php">Favoritos</a></button>
            <button class='voltar'><a href="post.php">post</a></button>
            <button class='voltar'><a href="lista.php">Lista</a></button>
            <h1>Adicionar Histórias | Histórias Excluidas</h1>
            <?php
                if (count($fanfics) > 0) {
                    foreach ($fanfics as $fanfic) {
                        echo "<p><strong>Título: </strong>{$fanfic['titulo']}</p>";
                        if (!empty($fanfic['imagem'])) {
                            echo '<img src="./' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100">';
                        } else {
                            echo 'Sem Imagem';
                        }
                        echo "<p><strong>Status: </strong>";
                        if ($fanfic['concluido']) {
                            echo "Concluído";
                        } else {
                            echo "Em andamento";
                        
                            echo "<form action='../../App/Providers/concluido.php' method='post'>";
                            echo "<input type='hidden' name='id_fanfic' value='{$fanfic['id_fanfic']}'>";
                            echo "<input class='botao' type='submit' name='marcar_concluido' value='Marcar como Concluído'>";
                            echo "</form>";
                        }
                        echo "</p>";
                    
                        echo "<p><strong>Sinopse: </strong>" . $fanfic['sinopse'] . "</p><br>";
                    
                        echo "<a style='color:black;' href='../../App/Providers/atualizar.php?id={$fanfic['id_fanfic']}'>Atualizar</a>" . "<br>";
                        echo "<a style='color:black;' href='../../App/Providers/deletar.php?id_fanfic={$fanfic['id_fanfic']}'>Deletar</a>" . "<br>";
                        echo "<a style='color:black;' href='capview.php?fanfic_id={$fanfic['id_fanfic']}'>Visualizar Capítulos</a>" . "<br>";
                        if ($fanfic['concluido']){
                        
                        } else {
                            echo "<a style='color:black;' href='capost.php?fanfic_id={$fanfic['id_fanfic']}'>Adicionar Capítulo</a>" . "<br><br>";
                        }
                    }
                } else {
                    echo "<h3>Você ainda não postou nenhuma história. <a href='post.php'>Quer postar uma história?</a></h3>";
                }
            ?>
        </div>
    </section>
</body>
</html>
