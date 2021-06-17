<?php

require_once '../controller/ClientesController.php';
require_once '../controller/ProdutosController.php';
$clientes = new ClientesController();
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

<body>
    <div class="container">
        <h1 class="p-1 title">Realizar Venda</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' id="form" action="./finalizarVenda.php" method="POST">

            <div class="mb-3">
                <label for="id-cliente" class="form-label">Selecionar Cliente</label>
                <select name="id-cliente" class="form-select" id="id-cliente" required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php
                    foreach ($clientes->findAll() as $cliente) { ?>
                        <option value="<?= $cliente->getIdCliente() ?>"><?= $cliente->getNome() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div>
            <div id="area-produto">
                <div class="mb-3 d-flex justify-content-between" id="produto-specs">
                    <div class="input">
                        <label for="id-produto[]" class="form-label">Selecionar Produto</label>
                        <select name="id-produto[]" class="form-select" id="id-produto" required>
                            <option value="" selected disabled>Selecione um produto</option>
                            <?php
                            foreach ($produtos->findAll() as $produto) { ?>
                                <option value="<?= $produto->getId() ?>"><?= $produto->getNome() ?></option> <?php
                                                                                                            }
                                                                                                                ?>
                        </select>
                    </div>
                    <div class="input" style="width: 25% !important;">
                        <label for="quantidade[]" class="form-label">Quantidade</label>
                        <input type="number" step="any" min="1" name="quantidade[]" class="form-control" id="quantidade" required>
                    </div>
                </div>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar Venda</button>
            </div>
        </form>
    </div>
</body>


</html>