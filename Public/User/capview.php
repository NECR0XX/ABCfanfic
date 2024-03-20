<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/CapController.php';
require_once '../../App/Controller/FanficController.php';

$capController = new CapController($pdo);

$fanfic_id = $_GET['fanfic_id'];
$caps = $capController->listarCaps($fanfic_id);

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics($_SESSION['usuarioId']);
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
        <a href="perfil.php">voltar</a>
    </header>
    <section>
        <h1>Capítulos</h1>
        <?php
            if (count($caps) > 0) {
                foreach ($caps as $cap) {
                    echo "<p><strong>{$cap['cap']}</strong></p>";
                    echo "<p><strong>Título: </strong>{$cap['titulo']}</p>";
                    echo "<p>" . $cap['texto'] . "</p><br>";
                
                    echo "<a style='color:black;' href='../../App/Providers/atualizarcap.php?id={$cap['id_capitulo']}'>Atualizar</a>" . "<br>";
                    echo "<a style='color:black;' href='../../App/Providers/deletarcap.php?id={$cap['id_capitulo']}'>Deletar</a>" . "<br><br><br>";
                }
            } else {
                echo "<h3>Você ainda não postou nenhum capítulo na sua fanfic. <a href='capost.php?fanfic_id={$fanfics[0]['id_fanfic']}'>Quer adicionar um?</a></h3>";
            }
        ?>

    </section>
</body>
</html>