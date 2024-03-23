<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
require_once '../../../App/Controller/FanficController.php';
require_once '../../../App/Controller/FavoritoController.php';

$fanfic_id = $_GET['fanfic_id'];

$fanficController = new FanficController($pdo);
$capController = new CapController($pdo);
$favoritoController = new FavoritoController($pdo);

$fanfics = $fanficController->getFanficById($fanfic_id);
$caps = $capController->listarCaps($fanfic_id);

$user_id = $_SESSION['usuarioId'];
$favoritada = $favoritoController->verificarFavorito($user_id, $fanfic_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../tags.php">Voltar</a><br><br>
    <?php if($favoritada): ?>
        <p>Fanfic favoritada</p>
    <?php else: ?>
        <form method='post' action="../../../App/Providers/favorito.php">
            <input type='hidden' name='fanfic_imagem' value="<?php echo $fanfics['imagem']; ?>">
            <input type='hidden' name='fanfic_titulo' value="<?php echo $fanfics['titulo']; ?>">
            <input type='hidden' name='user_id' value="<?php echo $_SESSION['usuarioId']; ?>">
            <input type='hidden' name='fanfic_id' value="<?php echo $fanfics['id_fanfic']; ?> ">
            <button type='submit'>Favoritar</button>
        </form>
    <?php endif; ?>

    <?php
    echo "<p><strong>Título: </strong>" . $fanfics['titulo'] . "</p>";
    echo "<p><strong>Autor: </strong>" . $fanfics['nome_user'] . "</p>";

    if (!empty($fanfics['imagem'])) {
        echo '<img src="../' . $fanfics['imagem'] . '" alt="Imagem do fanfic" width="100">';
    } else {
        echo 'Sem Imagem';
    }

    echo "<p><strong>Status: </strong>";
    echo $fanfics['concluido'] ? "Concluído" : "Em andamento";
    echo "</p>";
    echo "<p><strong>Sinopse: </strong>" . $fanfics['sinopse'] . "</p>";

    foreach ($caps as $cap) {
        echo "<a href='leituracap.php?id_capitulo={$cap['id_capitulo']}'>" . $cap['cap'] . "</a><br>";
    }
    ?>
</body>
</html>