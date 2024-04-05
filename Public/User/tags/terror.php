<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/FanficController.php';

if (isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];

    $fanficController = new FanficController($pdo);
    $fanfics = $fanficController->listarFanficsPorCategoria($categoria_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="../../../Resources/Css/stylecateg.css">
    <title>Lista de Fanfics de Terror</title>
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
    <section>
    <div class="container2">
            <h1 class= "tag2"><a href="../../landing.php">Abc fanfiction</h1></a> <h1 class= "tag"> > </h1> <h1 class= "tag2"><a href="../tags.php"> Tags </h1></a> <h1 class= "tag"> > </h1> <h1 class= "tag"> Terror </h1>
    </div>
        <div class="fanfic-container">
            <?php
                foreach ($fanfics as $fanfic) {
                    echo "<div class='fanfic'>";
                    echo "<h1>{$fanfic['titulo']}</h1>";
                
                    echo "<div style='display: flex;'>";
                    // Imagem do fanfic
                    if (!empty($fanfic['imagem'])) {
                        echo '<img src="../' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100" height= "120">';
                    } else {
                        echo 'Sem Imagem';
                    }
                
                    // Conteúdo à direita da imagem
                    echo "<div style='margin-left: 10px;'>";
                    // Status do fanfic
                    echo "<div>";
                    if ($fanfic['concluido']) {
                        echo "Concluído";
                    } else {
                        echo "Em andamento";
                    }
                    echo "</div>";
                    $sql = "SELECT COUNT(*) AS total_capitulos FROM capitulos WHERE fanfic_id = :fanfic_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':fanfic_id', $fanfic['id_fanfic']);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Número de capítulos
                    $sql = "SELECT texto FROM capitulos WHERE fanfic_id = :fanfic_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fanfic_id', $fanfic['id_fanfic']);
    $stmt->execute();

    // Inicializa a variável para armazenar o número total de palavras
    $total_palavras = 0;

    // Loop através de cada capítulo e calcular o número de palavras
    while ($capitulo = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Obtém o texto do capítulo
        $texto = $capitulo['texto'];

        // Divide o texto em palavras
        $palavras = str_word_count($texto);

        // Adiciona o número de palavras deste capítulo ao total
        $total_palavras += $palavras;
    }
                    echo "<div>";
                    echo "<p>Capítulos {$row['total_capitulos']}</p>";
                    echo "</div>";
                    echo "<div>";
                    echo "<p>Palavras {$total_palavras}</p>";
                    echo "</div>";

                    $sql = "SELECT COUNT(*) AS total_capitulos, MAX(data_adicao) AS ultima_atualizacao FROM capitulos WHERE fanfic_id = :fanfic_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':fanfic_id', $fanfic['id_fanfic']);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $ultima_atualizacao_formatada = date('d/m/Y H:i', strtotime($row['ultima_atualizacao']));
                
                    echo "<div>";
                    echo "<p>Atualizada em {$ultima_atualizacao_formatada}</p>";
                    echo "</div>";
                    
                    echo "</p>";
                    echo "</div>";
                    
                    echo "</div>"; // Fechar div.style
                    echo "<div class='sinopse'>";
                    echo "<p>{$fanfic['sinopse']}</p>";
                    echo "</div>";
                    echo "<p>(Entre na fanfic para ler o resto)</p>";

                    echo "<div class= 'btn'>";
                    echo "<a href='leiturafan.php?fanfic_id={$fanfic['id_fanfic']}' class='btn'>LER</a>";
                    echo "</div>";
                    echo "</div>"; // Fechar div.fanfic
                }
            ?>
        </div>
    </section>
</body>
</html>