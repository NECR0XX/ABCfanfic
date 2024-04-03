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

    public function getFanficById($fanfic_id) {
        $query = "SELECT * FROM fanfic WHERE id_fanfic = :fanfic_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':fanfic_id', $fanfic_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    

    public function listarFanficsPorCategoria($categoria_id) {
        $sql = "SELECT * FROM fanfic WHERE categoria_id = :categoria_id";
        $sql = "SELECT * FROM fanfic WHERE categoria_id = :categoria_id ORDER BY titulo ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    public function saveRating($fanficId, $rating) {
        try {
            $stmt = $this->pdo->prepare("UPDATE fanfic SET avaliacao_total = avaliacao_total + :rating, numero_avaliacoes = numero_avaliacoes + 1 WHERE id_fanfic = :fanficId");
            $stmt->execute(array(
                ':rating' => $rating,
                ':fanficId' => $fanficId
            ));
            return true; // Retorna verdadeiro se a atualização for bem-sucedida
        } catch (PDOException $e) {
            // Captura e imprime quaisquer erros de exceção
            echo "Erro ao salvar avaliação: " . $e->getMessage();
            return false; // Retorna falso se ocorrer um erro
        }
    }
    
}
?>
