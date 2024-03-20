<?php
class CapModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Caps
    public function criarCap($cap, $titulo, $texto, $fanfic_id) {
        $sql = "INSERT INTO capitulos (cap, titulo, texto, fanfic_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cap, $titulo, $texto, $fanfic_id]);
    }

    public function listarCaps($fanfic_id) {
        $query = "SELECT * FROM capitulos WHERE fanfic_id = :id_fanfic";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_fanfic', $fanfic_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  

    public function listarCapPorId($id_capitulo) {
        $query = "SELECT * FROM capitulos WHERE id_capitulo = :id_capitulo";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_capitulo', $id_capitulo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
