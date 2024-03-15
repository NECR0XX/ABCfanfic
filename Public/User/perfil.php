<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/FanficController.php';


$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="../landing.php">Cuzinho</a>
    </header>
    <section>
        <h1>Adicionar Histórias | Histórias Excluidas</h1>
        <?php
        if (count($fanfics) > 0) {
            foreach ($fanfics as $fanfic) {
                echo "<p>{$fanfic['titulo']}</p>";
            }
        } else {
            echo "<h3>Você ainda não postou nenhuma história. <a href='post.php'>Quer postar uma história?</a></h3>";
        }
        ?>
    </section>
</body>
</html>
