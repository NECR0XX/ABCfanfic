<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
$id_capitulo = $_GET['id_capitulo'];

$capController = new CapController($pdo);
$caps = $capController->listarCapPorId($id_capitulo);
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
        echo $caps['cap'] . "<p><strong>Título: </strong>" . $caps['titulo'] . "</p>";
        echo "<p><strong>Texto: </strong>" . $caps['texto'] . "</p>";
    ?>
    
</body>
</html>