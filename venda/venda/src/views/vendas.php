<?php

require_once '../controller/VendasController.php';
require_once '../controller/ClientesController.php';
$vendas = new VendasController();
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
        <h1 class="p-1 title">Vendas</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./realizarVenda.php" class="btn btn-sm btn-primary">Realizar venda</a>
        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>Cliente</th>
                <th>Valor Total</th>
                <th></th>
            </thead>
            <tbody>
                <?php


                foreach ($vendas->findAll() as $venda) { ?>
                    <tr>
                        <td> <?= $venda->getIdVenda() ?> </td>
                        <td> <?= $clientes->findOne($venda->getIdCliente())->getNome() ?> </td>
                        <td>R$ <?= number_format($venda->getValorTotal(), 2, ',', '') ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarVenda.php?id=<?= $venda->getIdVenda() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarVenda.php?id=<?= $venda->getIdVenda() ?>" class="btn btn-danger">apagar</a>
                                <br>
                            </div>
                        </td>
                    </tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>

</body>



</html>