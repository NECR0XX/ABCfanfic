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
    <title>Lista de Fanfics de Ação</title>
</head>
<body>
    <a href="../tags.php">Voltar</a><br><br>
    <?php
        foreach ($fanfics as $fanfic) {
            echo "<a href='leitura.php?'><p><strong>Título: </strong>{$fanfic['titulo']}</p></a>";
            echo "<p><strong>Autor: </strong>{$fanfic['nome_user']}</p>";
            if (!empty($fanfic['imagem'])) {
                echo '<img src="' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100">';
            } else {
                echo 'Sem Imagem';
            }
            echo "<p><strong>Status: </strong>";
            if ($fanfic['concluido']) {
                echo "Concluído";
            } else {
                echo "Em andamento";
            }
            echo "</p>";
        }
    ?>
</body>
</html>