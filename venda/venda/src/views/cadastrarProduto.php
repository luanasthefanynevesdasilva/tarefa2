<?php
    require '../controller/ProdutosController.php';
    $produto = new ProdutosController();
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
        <h1 class="p-1 title">Cadastrar Produtos</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        </div>
        <form class='form' action="./cadastrarProduto.php" method="POST">
            <div class="mb-3">
                <label for="nome-produto" class="form-label">Nome do Produto</label>
                <input type="text" name="nome-produto" class="form-control" id="nome-produto" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="preco" class="form-label">Preco</label>
                    <input type="number" step="any" name="preco" class="form-control" id="preco" required>
                </div>
                <div class="input">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" step="any" name="quantidade" class="form-control" id="quantidade" required>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        <?php

            if(!$_POST) return;
            $produto->setNome($_POST['nome-produto']);
            $produto->setPreco($_POST['preco']);
            $produto->setQuantidade($_POST['quantidade']);

            try {
                $produto->insert($produto->getNome(), $produto->getPreco(), $produto->getQuantidade());
                echo 'Produto cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o Produto!';
            }

        ?>
    </div>
</body>

</html>