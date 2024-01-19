<?php require_once '../controller/exibir.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../bootstrap.php' ?>

    <title>Document</title>
</head>

<body class="bg-dark">

    <?php require_once "../controller/editarCliente.php" ?>
    <form action="../controller/editarCliente.php" method="post" id="formEditarCliente" name="form">
        <div class="container bg-white mt-5 py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>VISUALIZAR/EDITAR CLIENTE</h2>
                    <hr class="bg-dark">
                </div>
                <div class="col-12">
                    <label for="">Nome do cliente</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="nome" id="nome" value="<?= $editar->getNome(); ?>">
                    <label for="">CPF</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="cpf" id="cpf" value="<?= $editar->getCpf(); ?>">
                    <label for="">Rua</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="rua" id="rua" value="<?= $editar->getRua(); ?>">
                    <label for="">Número</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="numero" id="numero" value="<?= $editar->getNumero(); ?>">
                    <label for="">Cidade</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="cidade" id="cidade" value="<?= $editar->getCidade(); ?>">
                    <label for="">Telefone</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" name="telefone" id="telefone" value="<?= $editar->getTelefone(); ?>">
                    <label for="">Alugado</label>
                    <input oninput="verifica()" type="text" class="col-12 py-3" disabled name="atual" id="atual" value="<?= $editar->getAlugado(); ?>">
                    <label for="">Trocar de Livro</label>
                    <select class="col-12 py-3" name="alugar" id="alugar" value="">
                        <option value="">Veja as opções</option>
                        <?php new exibirLivrosDisponiveisParaLocacao();   ?>
                    </select>


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
    const cpf = document.getElementById('cpf');
    const rua = document.getElementById('rua');
    const numero = document.getElementById('numero');
    const cidade = document.getElementById('cidade');
    const telefone = document.getElementById('telefone');

    editar.disabled = 0;

    function verifica() {
        if (nome.value == '' || cpf.value == '' || rua.value == '' || numero.value == '' || cidade.value == '' || telefone.value == '') {
            editar.disabled = 1;
        } else {
            editar.disabled = 0;
        }

    }
</script>

</html>