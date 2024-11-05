<?php
// Conectar ao banco de dados (o código de conexão permanece o mesmo)

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para verificar o usuário
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            // Iniciar a sessão e armazenar informações do usuário
            session_start();
            $_SESSION['usuario'] = $usuario['nome'];

            // Redirecionar para a página inicial após o login
            header("Location: index.html");
            exit();
        } else {
            echo "Senha incorreta. <a href='login.html'>Tente novamente</a>.";
        }
    } else {
        echo "Usuário não encontrado. <a href='cadastro.html'>Cadastre-se</a>.";
    }

    $stmt->close();
}

$conn->close();
?>