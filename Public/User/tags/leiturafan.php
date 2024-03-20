<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
require_once '../../../App/Controller/FanficController.php';
$fanfic_id = $_GET['fanfic_id'];

$fanficController = new FanficController($pdo);
$capController = new CapController($pdo);

$fanfics = $fanficController->getFanficById($fanfic_id);
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
    <a href="../tags.php">Voltar</a>
    <?php
            echo "<p><strong>Título: </strong>" . $fanfics['titulo'] . "</p>";
            echo "<p><strong>Autor: </strong>" . $fanfics['nome_user'] . "</p>";

            if (!empty($fanfics['imagem'])) {
                echo '<img src="../' . $fanfics['imagem'] . '" alt="Imagem do fanfic" width="100">';
            } else {
                echo 'Sem Imagem';
            }

            echo "<p><strong>Status: </strong>";
            if ($fanfics['concluido']) {
                echo "Concluído";
            } else {
                echo "Em andamento";
            }

            echo "</p>";
            echo "<p><strong>Sinopse: </strong>" . $fanfics['sinopse'] . "</p>";

        foreach ($caps as $cap) {
            echo "<a href='leituracap.php?id_capitulo={$cap['id_capitulo']}'>" . $cap['cap'] . "</a><br>";
        }
    ?>
</body>
</html>