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
    <title>Document</title>
</head>
<body>
    <header>
        <a href="../landing.php">voltar</a>
        <a href="post.php">post</a>
    </header>
    <section>
        <h1>Adicionar Histórias | Histórias Excluidas</h1>
        <?php
if (count($fanfics) > 0) {
    foreach ($fanfics as $fanfic) {
        echo "<p><strong>Título: </strong>{$fanfic['titulo']}</p>";
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

            echo "<form action='../../App/Providers/concluido.php' method='post'>";
            echo "<input type='hidden' name='id_fanfic' value='{$fanfic['id_fanfic']}'>";
            echo "<input type='submit' name='marcar_concluido' value='Marcar como Concluído'>";
            echo "</form>";
        }
        echo "</p>";

        echo "<p><strong>Sinopse: </strong>" . $fanfic['sinopse'] . "</p><br>";

        echo "<a style='color:black;' href='../../App/Providers/atualizar.php?id={$fanfic['id_fanfic']}'>Atualizar</a>" . "<br>";
        echo "<a style='color:black;' href='../../App/Providers/deletar.php?id={$fanfic['id_fanfic']}'>Deletar</a>" . "<br>";
        echo "<a style='color:black;' href='capview.php?fanfic_id={$fanfic['id_fanfic']}'>Vizualizar Capítulos</a>" . "<br>";
        if ($fanfic['concluido']){

        } else {
            echo "<a style='color:black;' href='capost.php?fanfic_id={$fanfic['id_fanfic']}'>Adicionar Capítulo</a>" . "<br><br>";
        }
    }
} else {
    echo "<h3>Você ainda não postou nenhuma história. <a href='post.php'>Quer postar uma história?</a></h3>";
}
?>

    </section>
</body>
</html>
