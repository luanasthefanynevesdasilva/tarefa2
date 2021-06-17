<?php

require_once '../controller/ClientesController.php';
require_once '../controller/ProdutosController.php';
require_once '../controller/VendasController.php';
require_once '../controller/ItensVendaController.php';

$idVenda = $_GET['id'];
$clientes = new ClientesController();
$produtos = new ProdutosController();
$venda = new VendasController();
$itensVenda = new ItensVendaController();

$venda = $venda->findOne($idVenda);
$itensVenda = $itensVenda->findAllIdVenda($idVenda);

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

        <h1 class="p-1 title">atualizar Venda</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' id="form" action="./atualizarVenda.php?id=<?= $idVenda ?>" method="POST">
            <div class="mb-3">
                <label for="id-cliente" class="form-label">Selecionar Cliente</label>

                <select name="id-cliente" class="form-select" id="id-cliente" disabled required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php
                    foreach ($clientes->findAll() as $cliente) {
                        if ($cliente->getIdCliente() == $venda->getIdCliente()) { ?>
                            <option selected value="<?= $cliente->getIdCliente() ?>"><?= $cliente->getNome() ?></option> <?php
                                                                                                                        } else { ?>
                            <option value="<?= $cliente->getIdCliente() ?>"><?= $cliente->getNome() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
            <div id="area-produto">
                <?php
                foreach ($itensVenda as $itemVenda) { ?>
                    <div class="mb-3 d-flex justify-content-between" id="produto-specs">
                        <div class="input">
                            <label for="id-produto[]" class="form-label">Selecionar Produto</label>
                            <select name="id-produto[]" class="form-select" id="id-produto" required>
                                <option value="" selected disabled>Selecione um produto</option>
                                <?php
                                foreach ($produtos->findAll() as $produto) {
                                    if ($produto->getId() == $itemVenda->getIdProduto()) { ?>
                                        <option selected value="<?= $produto->getId() ?>"><?= $produto->getNome() ?></option> <?php
                                                                                                                            } else { ?>
                                        <option value="<?= $produto->getId() ?>"><?= $produto->getNome() ?></option> <?php
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                            </select>
                        </div>
                        <div class="input" style="width: 25% !important;">
                            <label for="quantidade[]" class="form-label">Quantidade</label>
                            <input type="number" value="<?= $itemVenda->getQuantidade() ?>" step="any" name="quantidade[]" class="form-control" id="quantidade" required>
                        </div>
                    </div> <?php
                        }

                            ?>
            </div>
            <div class="button mt-3">
                <button type="submit" class="btn btn-lg btn-success">Atualizar</button>
            </div>
        </form>
    </div>
</body>


</html>