<?php
// Conectar ao banco de dados (o código de conexão permanece o mesmo)

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar a senha

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        // Redirecionar para a página inicial após o cadastro bem-sucedido
        header("Location: index.html");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>