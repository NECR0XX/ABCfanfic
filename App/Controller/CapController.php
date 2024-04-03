<?php
require_once 'C:\xampp\htdocs\ABCFanfic\App\Model\CapModel.php';

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
        $caps = $this->capModel->listarCaps($fanfic_id);
        return $caps;
    }

    public function listarCapsdom() {
        $caps = $this->capModel->listarCapsdom();
        return $caps;
    }

    public function listarCapPorId($id_capitulo) {
        $cap = $this->capModel->listarCapPorId($id_capitulo);
        return $cap;
    }    

    public function listarProximoCapitulo($id_capitulo_atual, $fanfic_id) {
        try {
            $query = "SELECT * FROM capitulos WHERE id_capitulo > :id_capitulo_atual AND fanfic_id = :fanfic_id ORDER BY id_capitulo ASC LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id_capitulo_atual', $id_capitulo_atual, PDO::PARAM_INT);
            $stmt->bindValue(':fanfic_id', $fanfic_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listarCapituloAnterior($id_capitulo_atual, $fanfic_id) {
        try {
            $query = "SELECT * FROM capitulos WHERE id_capitulo < :id_capitulo_atual AND fanfic_id = :fanfic_id ORDER BY id_capitulo DESC LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id_capitulo_atual', $id_capitulo_atual, PDO::PARAM_INT);
            $stmt->bindValue(':fanfic_id', $fanfic_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function exibirListaCaps() {
        $caps = $this->capModel->listarCaps();
        include '../../Resources/View/capitulos/lista.php';
    }
}
?>
