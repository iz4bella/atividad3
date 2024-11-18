<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; 
    }

    public function cadastrarUsuario($nome, $data_nascimento, $email, $senha, $endereco) {
        $sql = "INSERT INTO usuarios (nome, data_nascimento, email, senha, endereco) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $data_nascimento, $email, $senha, $endereco]);
    }


    public function autenticarUsuario($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC); 

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}
?>
