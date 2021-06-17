<?php
    require '../controller/ClientesController.php';
    $cliente = new ClientesController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <link rel="stylesheet" href="estilo.css">
    <title>Pagina Inicial</title>


</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./cadastrarCliente.php" method="POST">
            <div class="mb-3">
                <label for="nome-cliente" class="form-label">Nome completo</label>
                <input type="text" name="nome-cliente" class="form-control" id="nome-cliente" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" step="any" name="cpf" class="form-control" id="cpf" required>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        <?php

            if(!$_POST) return;
            $cliente->setNome($_POST['nome-cliente']);
            $cliente->setCpf($_POST['cpf']);

            try {
                $cliente->insert($cliente->getNome(), $cliente->getCpf());
                echo 'Cliente cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o cliente!';
            }

        ?>
    </div>
</body>


</html>