<?php
require('../conn.php');

$nome_usuario = $_POST['nome_usuario'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($nome_usuario) || empty($cpf) || empty($email) || empty($senha)) {
    echo "Os valores não podem ser vazios";
} elseif (!preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $cpf)) {
    echo "CPF inválido. Por favor, insira um CPF válido no formato xxx.xxx.xxx-xx.";
} else {
    $cad_usuarios = $pdo->prepare("INSERT INTO usuarios(nome_usuario, cpf, email, senha) 
        VALUES(:nome_usuario, :cpf, :email, :senha)");
    $cad_usuarios->execute(array(
        ':nome_usuario' => $nome_usuario,
        ':cpf' => $cpf,
        ':email' => $email,
        ':senha' => $senha
    ));

    echo "<script>
        alert('Usuário cadastrado com sucesso!');
        </script>";
}
?>
