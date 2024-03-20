<?php
require_once 'C:\xampp\htdocs\Fanfic_teste\App\Model\CapModel.php';

class CapController {
    private $capModel;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->capModel = new CapModel($pdo);
    }

    public function criarCap($cap, $titulo, $texto, $fanfic_id) {
        $this->capModel->criarCap($cap, $titulo, $texto, $fanfic_id);
    }

    public function listarCaps($fanfic_id) {
        $query = "SELECT * FROM capitulos WHERE fanfic_id = :id_fanfic";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_fanfic', $fanfic_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function exibirListaCaps() {
        $caps = $this->capModel->listarCaps();
        include '../../Resources/View/capitulos/lista.php';
    }
}
?>
