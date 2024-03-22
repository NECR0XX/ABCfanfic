<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
require_once '../../../App/Controller/FanficController.php';

$id_capitulo = isset($_GET['id_capitulo']) ? $_GET['id_capitulo'] : 0;

$capController = new CapController($pdo);
$fanficController = new FanficController($pdo);

$caps = $capController->listarCapPorId($id_capitulo);

$proximo_capitulo = $capController->listarProximoCapitulo($id_capitulo, $caps['fanfic_id']);
$capitulo_anterior = $capController->listarCapituloAnterior($id_capitulo, $caps['fanfic_id']);
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
        if ($caps) {
            $id_fanfic = $caps['fanfic_id'];
            echo "<a href='leiturafan.php?fanfic_id=$id_fanfic'>Voltar para a fanfic</a>";
            echo "<p>" . $caps['cap'] . "<strong> - </strong>" . $caps['titulo'] . "</p>";
            echo "<p><strong>Texto: </strong>" . $caps['texto'] . "</p>";
        
            if ($proximo_capitulo) {
                $id_proximo_capitulo = $proximo_capitulo['id_capitulo'];
                $url_proximo_capitulo = "leituracap.php?id_capitulo=$id_proximo_capitulo";
                $link_proximo_capitulo = "<a href='$url_proximo_capitulo'>Próximo Capítulo</a>";
                echo $link_proximo_capitulo;
            }
        
            if ($capitulo_anterior) {
                $id_capitulo_anterior = $capitulo_anterior['id_capitulo'];
                $url_capitulo_anterior = "leituracap.php?id_capitulo=$id_capitulo_anterior";
                $link_capitulo_anterior = "<a href='$url_capitulo_anterior'>Capítulo Anterior</a>";
                echo $link_capitulo_anterior;
            }
        } else {
            echo "<p>Não foi possível encontrar o capítulo atual.</p>";
        }
    ?>
</body>
</html>
