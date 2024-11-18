<?php
require_once 'database.php';
require_once 'UserModel.php';
require_once 'UserService.php';

class UserController {
    private $userService;

    public function __construct() {
     
        $database = new Database();
        $pdo = $database->getConnection();
        $userModel = new UserModel($pdo); 
        $this->userService = new UserService($userModel);
    }

    public function cadastrar($nome, $data_nascimento, $email, $senha, $endereco) {
        return $this->userService->cadastrarUsuario($nome, $data_nascimento, $email, $senha, $endereco);
    }

    public function login($email, $senha) {
        return $this->userService->autenticarUsuario($email, $senha);
    }
}
?>
