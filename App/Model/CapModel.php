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

    // Model para listar Caps
    public function listarCaps() {
        $sql = "SELECT * FROM capitulos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
