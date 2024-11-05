<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Aqui você pode adicionar lógica para salvar os dados em um banco de dados ou enviar um e-mail

    // Exemplo: Exibir mensagem de sucesso
    echo "Cadastro realizado com sucesso! Nome: $nome, Email: $email";
} else {
    echo "Método não permitido.";
}
?>