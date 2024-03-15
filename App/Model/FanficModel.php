<?php
session_start();

class FanficModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Fanfics
    public function criarFanfic($imagem, $titulo, $sinopse, $text) {
        $nome_usuario = $_SESSION['usuarioNomedeUsuario'];
        $sql = "INSERT INTO fanfic (imagem, titulo, sinopse, text, nome_user) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$imagem, $titulo, $sinopse, $text, $nome_usuario]);
    }

    // Model para listar Fanfics
    public function listarFanfics() {
        $sql = "SELECT * FROM fanfic";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
