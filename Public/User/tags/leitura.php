<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
require_once '../../../App/Controller/FanficController.php';

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics2();

$fanfic_id = $_GET['fanfic_id'];
$caps = $capController->listarCaps($fanfic_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach ($fanfics as $fanfic) {
            echo "<a href='leitura.php?fanfic_id={$fanfic['id_fanfic']}'><p><strong>Título: </strong>{$fanfic['titulo']}</p></a>";
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