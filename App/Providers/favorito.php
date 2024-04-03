<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/FavoritoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fanfic_imagem'], 
            $_POST['fanfic_titulo'], 
            $_POST['user_id'], 
            $_POST['fanfic_id'])) {
        $favoritoController = new FavoritoController($pdo);

        $fanfic_imagem = $_POST['fanfic_imagem'];
        $fanfic_titulo = $_POST['fanfic_titulo'];
        $user_id = $_POST['user_id'];
        $fanfic_id = $_POST['fanfic_id'];

        $favoritoController->criarFavorito($fanfic_imagem, $fanfic_titulo, $user_id, $fanfic_id);

        header("Location: ../../Public/User/tags/leiturafan.php?fanfic_id=$fanfic_id");
        exit();
    } else {
        echo "Erro: Não foi possível favoritar a ffanfic, tente novamente mais tarde.";
    }
} else {
    echo "Erro: CU.";
}
?>
