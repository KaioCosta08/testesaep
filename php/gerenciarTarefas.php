<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/gerenciarTarefas.css">
    <title>Gerenciador Tarefas</title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        #body-gerenciarTarefas{
            font-family: 'Poppins', sans-serif;
        }

        #tarefasCadastradas{
            box-shadow: 0 0 9px 1px black;
            width: 50%;
            height: 70vh;
            margin-left: auto;
            margin-right: auto;
            padding: 20px 10px;
            margin-top: 50px;
            overflow: scroll;
        }

        .box-tarefa {
            border: 7px solid blue; 
            margin-top: 10px;
            font-size: 1.2rem;
            padding: 40px 20px;
            width: 100%;
            height: 21vh;
        }
    </style>
</head>

<body id="body-gerenciarTarefas">
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

    <main id="tarefasCadastradas">
        <?php
        require_once "conexao.php";

        $sql = "SELECT descricaoTarefa, nomeSetor, dataCadastrado, statu, prioridade FROM tarefa ORDER BY id_tarefa DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($dados) {

            foreach ($dados as $dado) {

            echo "<h1><strong>" . htmlspecialchars($dado['statu']) ."</strong></h1>";

            echo "<div class='box-tarefa'>";
            echo "<p><strong>Descrição:</strong> " . htmlspecialchars($dado['descricaoTarefa']) . "</p>";
            echo "<p><strong>Setor:</strong> " . htmlspecialchars($dado['nomeSetor']) . "</p>";
            echo "<p><strong>Data:</strong> " . htmlspecialchars($dado['dataCadastrado']) . "</p>";
            echo "<p><strong>Prioridade:</strong> " . htmlspecialchars($dado['prioridade']) . "</p>";
            echo "</div>";

            echo "<div class='box-tarefa-buttons'>";
            echo "";
            }

        }


        ?>
    </main>

</body>

</html>