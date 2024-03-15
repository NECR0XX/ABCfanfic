<?php
session_start();

class FanficModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Fanfics
    public function criarFanfic($imagem, $titulo, $text) {
        $nome_usuario = $_SESSION['usuarioNomedeUsuario'];
        $sql = "INSERT INTO fanfic (imagem, titulo, text, nome_user) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$imagem, $titulo, $text, $nome_usuario]);
    }

    // Model para listar Fanfics
    public function listarFanfics() {
        $sql = "SELECT * FROM fanfic";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Fanfics
    public function atualizarFanfic($id_fanfic, $imagem, $titulo, $text, $nome_user){
        $sql = "UPDATE fanfic SET imagem = ?, titulo = ?, text = ?, nome_user = ? WHERE id_fanfic = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$imagem, $titulo, $text, $nome_user, $id_fanfic]);
    }
    
    // Model para deletar Fanfic
    public function excluirFanfic($id_fanfic) {
        $sql = "DELETE FROM fanfic WHERE id_fanfic = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_fanfic]);
    }
}
?>
