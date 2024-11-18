<?php
class UserService {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function criptografarSenha($senha) {
        return password_hash($senha, PASSWORD_DEFAULT); 
    }

    public function cadastrarUsuario($nome, $data_nascimento, $email, $senha, $endereco) {
        $senhaCriptografada = $this->criptografarSenha($senha);
        return $this->userModel->cadastrarUsuario($nome, $data_nascimento, $email, $senhaCriptografada, $endereco);
    }

    public function autenticarUsuario($email, $senha) {
        return $this->userModel->autenticarUsuario($email, $senha); 
    }
}
?>
