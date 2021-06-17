<?php

require '../controller/ClientesController.php';
if (!$_GET) header('Location: ./clientes.php');;
$idCliente = $_GET['id'];
$cliente = new ClientesController();
$cliente->setIdCliente($idCliente);
$cliente->setNome($cliente->findOne($idCliente)->getNome());
$cliente->setCpf($cliente->findOne($idCliente)->getCpf());


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

        <h1 class="p-1 title">atualizar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarCliente.php?id=<?= $cliente->getIdCliente() ?>" method="POST">
            <div class="mb-3">
                <label for="nome-cliente" class="form-label">Nome completo</label>
                <input type="text" value="<?= $cliente->getNome() ?>" name="nome-cliente" class="form-control" id="nome-cliente" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" value="<?= $cliente->getCpf() ?>" step="any" name="cpf" class="form-control" id="cpf" required>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $cliente->setNome($_POST['nome-cliente']);
        $cliente->setcpf($_POST['cpf']);

        try {
            $cliente->update($idCliente);
            header("Location: ./Clientes.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o cliente!';
        }

        ?>
    </div>
</body>


</html>