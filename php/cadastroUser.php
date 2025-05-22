<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/cadastroUser.css">
    <title>Document</title>
</head>

<body id="body-register">

    <!-- Header -->
    <header class="header">

        <!-- Caixa da logo -->
        <div class="box-logo">
            <h1>Gerenciador de tarefas</h1>
        </div>

        <!-- Nav de links do header -->
        <nav class="nav-header">
            <ul class="ul-header">
                <li class="li-header"><a href="cadastroUser.php" class="a-header">Cadastro de Usuários</a></li>
                <li class="li-header"><a href="cadastroTarefas.php" class="a-header">Cadastro de Tarefas</a></li>
                <li class="li-header"><a href="gerenciarTarefas.php" class="a-header">Gerenciar Tarefas</a></li>
            </ul>
        </nav>
    </header>

    <form action="" method="post" id="register-form">
        <h1 class="title-form">Cadastro de usuários</h1>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <input type="email" name="email" id="email" placeholder="Digite seu email">

        <button type="submit" class="button-form-register">Cadastrar</button>
    </form>
</body>

</html>

<!-- PHP -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'conexao.php';

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    $sql = "INSERT INTO usuario(nome, email) VALUES (:nome, :email)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);

    if ($stmt->execute()) {
        echo "<script>alert('Dados cadastrados com sucesso!')</script>";
    } else {
        echo "Dados recusados!";
    }
}
?>