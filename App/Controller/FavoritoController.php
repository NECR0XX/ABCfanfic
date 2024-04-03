<?php
require_once 'C:\xampp\htdocs\ABCFanfic\App\Model\FavoritoModel.php';

class FavoritoController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->favoritoModel = new FavoritoModel($pdo);
    }

    public function criarFavorito($fanfic_imagem, $fanfic_titulo, $user_id, $fanfic_id) {
        $this->favoritoModel->criarFavorito($fanfic_imagem, $fanfic_titulo, $user_id, $fanfic_id);
    }

    public function listarFavoritos($user_id) {
        $favoritos = $this->favoritoModel->listarFavoritos($user_id);
        return $favoritos;
    }

    public function verificarFavorito($user_id, $fanfic_id) {
        $sql = "SELECT COUNT(*) AS total FROM favoritos WHERE user_id = ? AND fanfic_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $fanfic_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['total'] > 0;
    }    
}
?>
