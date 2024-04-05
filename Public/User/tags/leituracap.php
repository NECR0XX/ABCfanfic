<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
require_once '../../../App/Controller/FanficController.php';

$id_capitulo = isset($_GET['id_capitulo']) ? $_GET['id_capitulo'] : 0;

$capController = new CapController($pdo);
$fanficController = new FanficController($pdo);

$caps = $capController->listarCapPorId($id_capitulo);
if ($caps) {
    $id_fanfic = $caps['fanfic_id'];
    $fanfics = $fanficController->getFanficById($id_fanfic); // Recuperando os detalhes da fanfic

    // Restante do seu código para exibir os detalhes do capítulo e da fanfic
} else {
    echo "<p>Não foi possível encontrar o capítulo atual.</p>";
}
$proximo_capitulo = $capController->listarProximoCapitulo($id_capitulo, $caps['fanfic_id']);
$capitulo_anterior = $capController->listarCapituloAnterior($id_capitulo, $caps['fanfic_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" type="text/css" href="../../../Resources/css\leiturafan.css" />
    <title>Ler Capítulo</title>
</head>
<body>
    <header>
        <div class="cabpri">
            <div class="logo">
                <img src="../../../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
                <h1>Abc fanfiction</h1>
            </div>
            <div class="acess">
                <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <button id="log" onclick="logout()">Sair</button>
                <?php else: ?>
                    <h3><a href="../../../login.php">conecte-se</a></h3>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="cabsec">
            <div class="bots">
                <a href="../tags.php">Tags</a>
                <?php
                    if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <a href="../perfil.php">perfil</a><br>
                <?php else: ?>
                <?php endif; ?>
                <a href="../sobre.php">Sobre</a>
                <a href="../tags.php">Voltar</a>
            </div>
            <div class="search">
                <form id="search-form">
                    <input type="search" id="search-input" placeholder="Pesquise Aqui">
                        <ul id="suggestions"></ul>
                </form>
                    </div>
                <script src="../../../Resources/Js/searchtags.js"></script>
            </div>
    </header>
<body>
    <section>
        <div class="container">
           
        <?php 
        
        echo "<div class= 'container2'> 
        História " . $fanfics['titulo'] . " - ". $caps['titulo'] ." 
        </div>";

        if ($caps) {
            $id_fanfic = $caps['fanfic_id'];
            echo "<div class= 'cap'>" . $caps['cap'] . "</div>";
            echo "<p>" . $caps['texto'] . "</p>";
        
            if ($capitulo_anterior) {
                $id_capitulo_anterior = $capitulo_anterior['id_capitulo'];
                $url_capitulo_anterior = "leituracap.php?id_capitulo=$id_capitulo_anterior";
                $link_capitulo_anterior = "<a href='$url_capitulo_anterior'>Capítulo Anterior</a>";
                echo $link_capitulo_anterior;
            }

            if ($proximo_capitulo) {
                $id_proximo_capitulo = $proximo_capitulo['id_capitulo'];
                $url_proximo_capitulo = "leituracap.php?id_capitulo=$id_proximo_capitulo";
                $link_proximo_capitulo = "<a href='$url_proximo_capitulo'>Próximo Capítulo</a>";
                echo $link_proximo_capitulo;
            }
        } else {
            echo "<p>Não foi possível encontrar o capítulo atual.</p>";
        }
        echo "<a href='leiturafan.php?fanfic_id=$id_fanfic'>Voltar para a fanfic</a>";
    ?>
        </div>
    </section>
</body>
</html>
