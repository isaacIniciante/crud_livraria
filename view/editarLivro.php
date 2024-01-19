<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../bootstrap.php' ?>
    <title>Document</title>
</head>

<body class="bg-dark">

    <?php require_once "../controller/editarLivro.php" ?>
    <form action="../controller/editarLivro.php" method="post" id="formEditarLivro" name="form">
        <div class="container bg-white mt-5 py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>VISUALIZAR/EDITAR LIVRO</h2>
                    <hr class="bg-dark">
                </div>
                <div class="col-12">
                    <label for="">Nome do livro</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="nome" id="nome" value="<?= $editar->getNome(); ?>">
                    <label for="">Autor</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="autor" id="autor" value="<?= $editar->getAutor(); ?>">
                    <label for="">Preço</label>
                    <input oninput="verifica()" type="number" class="col-12 py-3" name="preco" id="preco" value="<?= $editar->getPreco(); ?>">
                    <label for="">Quantidade de livros</label>
                    <input oninput="verifica()" type="number" class="col-12 py-3" name="quantidade" id="quantidade" value="<?= $editar->getQuantidade(); ?>">

                    <input type="hidden" name="id" value="<?php echo $editar->getNome(); ?>">
                    <button type="submit" class="btn btn-secondary" name="editar" id="editar">EDITAR</button>
                    <a type="button" href="../view/index.php" class="btn btn-danger">Voltar</a>

                </div>
            </div>
        </div>
    </form>

</body>

<script>
    if (document.getElementById('nome').value == '') {
        alert('Este documento não pode ser alterado. EXCLUA-O !');
        window.location.href = 'index.php';
    }


    const nome = document.getElementById('nome');
    const autor = document.getElementById('autor');
    const preco = document.getElementById('preco');
    const quantidade = document.getElementById('quantidade');
    const editar = document.getElementById('editar');
    editar.disabled = 0;
    function verifica() {
        if (nome.value == '' ||  autor.value == '' || preco.value == '' || quantidade.value == '') {
            editar.disabled = 1;
        } else {
            editar.disabled = 0;
        }

    }
</script>

</html>