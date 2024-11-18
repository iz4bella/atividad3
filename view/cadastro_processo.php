<?php
require_once 'UserController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $pdo = new PDO('mysql:host=localhost;dbname=sistema_login', 'root', ''); 
    $userController = new UserController($pdo);
    
    $usuario = $userController->login($email, $senha);

    if ($usuario) {
        echo "Login bem-sucedido!";
    } else {
        echo "Email ou senha inválidos!";
    }
}
?>
