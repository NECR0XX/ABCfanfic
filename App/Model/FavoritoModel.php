<?php
class FavoritoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Favoritos
    public function criarFavorito($fanfic_imagem, $fanfic_titulo, $user_id, $fanfic_id) {
        $sql = "INSERT INTO favoritos (fanfic_imagem, fanfic_titulo, user_id, fanfic_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$fanfic_imagem, $fanfic_titulo, $user_id, $fanfic_id]);
    }

    public function listarFavoritos($user_id) {
        $query = "SELECT * FROM favoritos WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>