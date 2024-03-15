<?php
require_once '../App/Model/LoginModel.php';


class LoginController {
    private $loginModel;

    public function __construct($pdo) {

        $this->loginModel = new LoginModel($pdo);
    }

    public function criarLogin($nome, $email, $senha) {
        $this->loginModel->criarLogin($nome, $email, $senha);
    }
}
?>