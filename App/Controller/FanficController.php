<?php
require_once 'C:\xampp\htdocs\ABCFanfic\App\Model\FanficModel.php';

class FanficController {
    private $fanficModel;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->fanficModel = new FanficModel($pdo);
    }

    public function criarFanfic($imagem, $titulo, $sinopse, $categoria_id, $nome_user, $user_id) {
        $this->fanficModel->criarFanfic($imagem, $titulo, $sinopse, $categoria_id, $nome_user, $user_id);
    }

    public function listarFanfics($user_id) {
        $fanfics = $this->fanficModel->listarFanfics($user_id);
        return $fanfics;
    }
    
    public function getFanficById($fanfic_id) {
        $fanfics = $this->fanficModel->getFanficById($fanfic_id);
        return $fanfics;
    }
    
    public function listarFanficsPorCategoria($categoria_id) {
        $fanfics = $this->fanficModel->listarFanficsPorCategoria($categoria_id);
        return $fanfics;
    }

    public function exibirListaFanfics() {
        $fanfics = $this->fanficModel->listarFanfics();
        include '../../Resources/View/fanfics/lista.php';
    }
    public function saveRating($fanficId, $rating) {
        echo "Salvando avaliação para a fanfic de ID: $fanficId com a avaliação: $rating";
        $this->fanficModel->saveRating($fanficId, $rating);
    }
}
?>
