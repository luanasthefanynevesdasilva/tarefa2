<?php
require '../controller/ClientesController.php';
$clientes = new ClientesController();
?>

<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <link rel="stylesheet" href="estilo.css">
    <title>Pagina Inicial</title>


</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Clientes</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
            <a href="./cadastrarCliente.php" class="btn btn-sm btn-primary">Cadastrar cliente</a><br>
        </div>
        <table class="table table-striped " id="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($clientes->findAll() as $cliente) : ?>
                    <tr>
                        <td> <?= $cliente->getIdCliente() ?> </td>
                        <td> <?= $cliente->getNome() ?> </td>
                        <td> <?= $cliente->getCpf() ?> </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarCliente.php?id=<?= $cliente->getIdCliente() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarCliente.php?id=<?= $cliente->getIdCliente() ?>" class="btn btn-danger">apagar</a><br>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>




</html>