<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/cadastroTarefas.css">
    <title>Register Tarefa</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header */

        .header {
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: baseline;
            gap: 15%;
            background-color: #0056b3;
            box-shadow: 0 0 10px 1px black;
            color: #fff;
        }


        .ul-header {
            display: flex;
            justify-content: space-around;
            list-style-type: none;
            color: #ffff;
            width: 580px;
        }

        .a-header {
            text-decoration: none;
            color: #fff;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        .a-header:hover {
            color: #C0C0C0;
        }

        /* Titulo do formulário */
        .title-form {
            text-align: center;
            /* text-transform: uppercase; */
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            font-weight: 300;
        }


        /* Formulario do cadastro de tarefas */
        #register-form {
            box-shadow: 0 0 10px 1px black;
            border-radius: 10px;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 500px;
            height: 75%;
            padding: 20px 20px;
            display: flex;
            flex-direction: column;
        }

        #register-form input {
            margin-top: 50px;
            height: 40px;
            border-radius: 9px;
            padding: 5px 15px;
            outline: none;
            border: none;
            border: 1px solid black;
        }

        #register-form select {
            margin-top: 50px;
            height: 40px;
            border-radius: 9px;
            padding: 5px 15px;
            outline: none;
            border: none;
            border: 1px solid black;
        }

        .title-form {
            text-align: center;
            /* text-transform: uppercase; */
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            font-weight: 300;
        }


        .button-form-register {
            margin: 0 auto;
            margin-top: 45px;
            width: 240px;
            height: 5vh;
            border: none;
            outline: none;
            border-radius: 10px;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .button-form-register:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>

</head>

<body>
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

    <!-- Form Cadastro de tarefas -->
    <form action="" method="post" id="register-form">
        <h1 class="title-form">Cadastro de tarefas</h1>
        <input type="text" name="descricaoTarefa" id="tarefa" placeholder="Descrição da tarefa" required>
        <input type="text" name="setorTarefa" id="setor" placeholder="Setor" required>
        <input type="date" name="dataTarefa" id="dataTarefa" placeholder="Data da Tarefa" required>

        <!-- Seleciona o usuario da tarefa -->
        <select name="usuarios" id="usuarios">
            <option value="#" selected disabled>Usuário</option>
            <?php

            require_once 'conexao.php';

            $sql = "SELECT nome FROM usuario";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($usuarios as $usuario) {
                echo "<option value='{$usuario['nome']}'> {$usuario['nome']} </option> ";
            }
            
            ?>
        </select>

        <!-- Seleciona o status da tarefa -->
        <select name="statusTarefa" id="statusTarefa">
            <option value="#" selected disabled>Status</option>
            <option value="afazer">A fazer</option>
            <option value="fazendo">Fazendo</option>
            <option value="pronto">Pronto</option>
        </select>


        <!-- Seleciona o nível de prioridade da tarefa -->
        <select name="prioridadeTarefa" id="prioridade">
            <option value="#" selected disabled>Prioridade</option>
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>

        <button type="submit" class="button-form-register">Cadastrar</button>
    </form>

</body>

</html>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'conexao.php';

    $descricaoTarefa = $_POST['descricaoTarefa'] ?? '';
    $setorTarefa = $_POST['setorTarefa'] ?? '';
    $dataTarefa = $_POST['dataTarefa'] ?? '';
    $statusTarefa = $_POST['statusTarefa'] ?? '';
    $prioridadeTarefa = $_POST['prioridadeTarefa'] ?? '';

    
    $sql = "INSERT INTO tarefa(descricaoTarefa, nomeSetor, dataCadastrado, statu, prioridade) VALUES (:descricaoTarefa, :nomeSetor, :dataCadastrado, :statu, :prioridade)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":descricaoTarefa", $descricaoTarefa);
    $stmt->bindParam(":nomeSetor", $setorTarefa);
    $stmt->bindParam(":dataCadastrado", $dataTarefa);
    $stmt->bindParam(":statu", $statusTarefa);
    $stmt->bindParam(":prioridade", $prioridadeTarefa);

    if($stmt->execute()) {
        echo "<script>alert('Dados cadastrados com sucesso!')</script>";
    } else {
        echo "Dados recusados!";
    }
}
?>