<?php

require_once '../controller/ProdutosController.php';
$produtos = new ProdutosController();
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
        <h1 class="p-1 title">Produtos</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./cadastrarProduto.php" class="btn btn-sm btn-primary">Cadastrar produto</a>
        </div>
        <table class="table table-striped" id="table">
            <thead >
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($produtos->findAll() as $produto) { ?>
                    <tr>
                        <td> <?= $produto->getId() ?> </td>
                        <td> <?= $produto->getNome() ?> </td>
                        <td>R$ <?= number_format($produto->getPreco(), 2, ',', '') ?> </td>
                        <td> <?= $produto->getQuantidade() ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="editarProduto.php?id=<?= $produto->getId() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarProduto.php?id=<?= $produto->getId() ?>" class="btn btn-danger">apagar</a><br>
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