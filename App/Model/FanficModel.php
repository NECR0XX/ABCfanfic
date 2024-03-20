<?php
session_start();

class FanficModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Fanfics
    public function criarFanfic($imagem, $titulo, $sinopse, $categoria_id) {
        $nome_user = $_SESSION['usuarioNomedeUsuario'];
        $user_id = $_SESSION['usuarioId'];
        $sql = "INSERT INTO fanfic (imagem, titulo, sinopse, categoria_id, nome_user, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$imagem, $titulo, $sinopse, $categoria_id, $nome_user, $user_id]);
    }

    // Model para listar Fanfics
    public function listarFanfics($user_id) {
        $query = "SELECT * FROM fanfic WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarFanficsPorCategoria($categoria_id) {
        $sql = "SELECT * FROM fanfic WHERE categoria_id = :categoria_id";
        $sql = "SELECT * FROM fanfic WHERE categoria_id = :categoria_id ORDER BY titulo ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
}
?>
