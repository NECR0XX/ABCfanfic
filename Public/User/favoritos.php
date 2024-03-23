<?php
session_start();
require_once '../../Config/config.php';
require_once '../../App/Controller/FavoritoController.php';

$favoritoController = new FavoritoController($pdo);
$favoritos = $favoritoController->listarFavoritos($_SESSION['usuarioId']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="perfil.php">Voltar</a>
    <h1>Seus Favoritos</h1>
    <?php
    if (count($favoritos) > 0) {
        foreach ($favoritos as $favorito) {
            echo "<a href='tags/leiturafan.php?fanfic_id={$favorito['fanfic_id']}'><p><strong>Título: </strong>{$favorito['fanfic_titulo']}</p></a>";
            if (!empty($favorito['fanfic_imagem'])) {
                echo '<img src="' . $favorito['fanfic_imagem'] . '" alt="Imagem do favorito" width="100">';
            } else {
                echo 'Sem Imagem';
            }
        }
    }
            else {
        echo "<h3>Você ainda não adicionou nenhuma fanfic aos favoritos.";
    }
    ?>
</body>
</html>