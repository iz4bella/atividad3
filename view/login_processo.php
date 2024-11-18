<?php
require_once 'UserController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];

    $pdo = new PDO('mysql:host=localhost;dbname=sistema_login', 'root', '');
    $userController = new UserController($pdo);
    
    if ($userController->cadastrar($nome, $data_nascimento, $email, $senha, $endereco)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro no cadastro!";
    }
}
?>
