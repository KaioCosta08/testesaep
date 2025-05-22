<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/cadastroTarefas.css">
    <title>Document</title>
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
        <input type="text" name="tarefa" id="tarefa" placeholder="Descrição da tarefa">
        <input type="text" name="setor" id="setor" placeholder="Setor">

        <!-- Seleciona o usuario da tarefa -->
        <select name="usuarios" id="usuarios">
            <option value="#" selected disabled>Usuário</option>
            <select name="usuarios" id="usuarios">
                <option value="#" selected disabled>Usuário</option>
                <?php
                require_once 'conexao.php';

                $stmt = $conn->prepare('SELECT nome FROM usuario');
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($resultado) > 0){
                    
                }
                ?>
            </select>

        </select>

        <!-- Seleciona o nível de prioridade da tarefa -->
        <select name="prioridade" id="prioridade">
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



}




?>