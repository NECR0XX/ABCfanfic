<?php
require_once '../../App/Model/FanficModel.php';


class FanficController {
    private $fanficModel;

    public function __construct($pdo) {

        $this->fanficModel = new FanficModel($pdo);
    }

    public function criarFanfic($imagem, $titulo, $text, $nome_user) {
        $this->fanficModel->criarFanfic($imagem, $titulo, $text, $nome_user);
    }

    public function listarFanfics() {
        return $this->fanficModel->listarFanfics();
    }

    public function exibirListaFanfics() {
        $fanfics = $this->fanficModel->listarFanfics();
        include '../../Resources/View/fanfics/lista.php';
    }

    public function atualizarFanfic($id_fanfic, $imagem, $titulo, $text, $nome_user) {
        $this->fanficModel->atualizarFanfic($id_fanfic, $imagem, $titulo, $text, $nome_user);
    }
    
    public function excluirFanfic ($id_fanfic) {
        $this->fanficModel->excluirfanfic($id_fanfic);
    }
}
?>