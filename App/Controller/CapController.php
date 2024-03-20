<?php
require_once 'C:\xampp\htdocs\ABCfanfic\App\Model\CapModel.php';

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

    public function listarCapPorId($id_capitulo) {
        $cap = $this->capModel->listarCapPorId($id_capitulo);
        return $cap;
    }    

    public function exibirListaCaps() {
        $caps = $this->capModel->listarCaps();
        include '../../Resources/View/capitulos/lista.php';
    }
}
?>
