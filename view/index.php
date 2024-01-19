<?php require_once '../controller/exibir.php';
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../bootstrap.php' ?>
    <link rel="stylesheet" href="index.css">
    <style>
        #tabelaLivros {
            display: none;
            animation: aparecer 300ms;
        }

        #tabelaClientes {
            display: none;
            animation: aparecer 300ms;
        }


        @keyframes aparecer {
            0% {
                opacity: 0%;
            }
        }
    </style>

    <title>Sistema livraria</title>
</head>

<body class="bg-dark">

    <div class="col-12 text-center">
        <h3 class="mt-5 text-white">Livraria Dona Socorro</h3>
        <hr class="bg-white">
    </div>

    <div class="container-fluid bg-white py-3">
        <div class="row">
            <div class="col-6">
                <button class="col-12 btn btn-secondary py-3 mt-2" data-bs-toggle="modal" data-bs-target="#modalAddLivro">
                    <i class="bi bi-book"></i> Adicionar Livro
                </button>
                <button class="col-12 btn btn-dark mt-2" id="btnVerLivros">
                    <i class="bi bi-eye"></i> Ver livros
                </button>
            </div>
            <div class="col-6">
                <button class="col-12 btn btn-secondary py-3 mt-2" data-bs-toggle="modal" data-bs-target="#modalAddCliente">
                    <i class="bi bi-person-add"></i> Adicionar Cliente
                </button>
                <button class="col-12 btn btn-dark mt-2" id="btnVerClientes">
                    <i class="bi bi-eye"></i> Ver Clientes
                </button>
            </div>
            <div class="col-12 text-center mt-2" id="mensagem"><?= '' ?></div>
        </div>
    </div>

    <div class="col-12 bg-white py-3 mt-5">
        <div class="col-12 text-center" id="tabelaLivros">
            <h1>LIVROS</h1>
            <div class="bg-success col text-white">Em estoque</div>
            <div class="bg-secondary col text-white">Sem estoque</div>
            <hr>
            <div class="row">
                <?php new exibirLivros(); ?>
            </div>
        </div>
        <div class="col-12 text-center" id="tabelaClientes">
            <h1>CLIENTES</h1>
            <div class="bg-success col text-white">Alugaram</div>
            <div class="bg-secondary col text-white">Não Alugaram</div>
            <hr>
            <div class="row">
                <?php new exibirClientes(); ?>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalAddLivro">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Adicionar Livro</h2>
                    <h1 data-bs-dismiss="modal">x</h1>
                </div>
                <form action="../controller/incluir.php?op=livro" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="item" value='livro'>
                        <label for="">Nome do livro</label>
                        <input type="text" class="col-12 py-2" oninput="validarLivro()" name="nome" id="nomeLivro">
                        <label for="">Autor</label>
                        <input type="text" class="col-12 py-2" oninput="validarLivro()" name="autor" id="autor">
                        <label for="">Quantidade</label>
                        <input type="number" class="col-12 py-2" oninput="validarLivro()" name="quantidade" id="quantidade">
                        <label for="">Preço por dia</label>
                        <input type="text" class="col-12 py-2" oninput="validarLivro()" name="preco" id="preco">
                    </div>
                    <div class="modal-footer">
                        <input data-bs-dismiss="modal" type="button" class="btn btn-danger" value="FECHAR">
                        <input type="submit" id="btnSalvarLivro" class="btn btn-info" value="SALVAR">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddCliente">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Adicionar Cliente</h2>
                    <h1 data-bs-dismiss="modal">x</h1>
                </div>
                <form action="../controller/incluir.php?op=cliente" method="post">
                    <div class="modal-body">
                        <label for="">Nome</label>
                        <input type="text" class="col-12 py-2" oninput="validarCliente()" name="nome" id="nome">
                        <label for="">CPF</label>
                        <input type="number" class="col-12 py-2" oninput="validarCliente()" name="cpf" id="cpf">
                        <div class="col-12 h1">Endereço</div>
                        <label for="">Rua</label>
                        <input type="text" class="col-12 py-2" oninput="validarCliente()" name="rua" id="rua">
                        <label for="">Número da casa</label>
                        <input type="text" class="col-12 py-2" oninput="validarCliente()" name="numero" id="numero">
                        <label for="">Cidade</label>
                        <input type="text" class="col-12 py-2" oninput="validarCliente()" name="cidade" id="cidade">
                        <label for="">Telefone</label>
                        <input type="number" class="col-12 py-2" oninput="validarCliente()" name="telefone" id="telefone">
                        <label for="">Livro alugado?(Opicional)</label>
                        <select name="alugado" class="col-12 py-2" id="alugado">
                            <option value="">Veja as opções</option>
                            <?php new exibirLivrosDisponiveisParaLocacao();  ?>

                        </select>
                    </div>
                    <div class="modal-footer">
                        <input data-bs-dismiss="modal" type="button" class="btn btn-danger" value="FECHAR">
                        <input type="submit" id="btnSalvarCliente" class="btn btn-info" value="SALVAR">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script>
    document.getElementById("btnVerClientes").addEventListener('click', () => {

        document.getElementById("tabelaLivros").style.display = 'none';
        document.getElementById("tabelaClientes").style.display = 'block';
    });
    document.getElementById("btnVerLivros").addEventListener('click', () => {
        document.getElementById("tabelaLivros").style.display = 'block';
        document.getElementById("tabelaClientes").style.display = 'none';
    });

    const campoNome = document.getElementById('nomeLivro');
    const autor = document.getElementById('autor');
    const quantidade = document.getElementById('quantidade');
    const preco = document.getElementById('preco');
    const botao = document.getElementById('btnSalvarLivro');
    botao.disabled = 1;

    function validarLivro() {

        if (campoNome.value == '' || autor.value == '' || quantidade.value == '' || preco.value == '') {
            botao.disabled = 1;
        } else {
            botao.disabled = 0;
        }
    }

    const nome = document.getElementById('nome');
    const cpf = document.getElementById('cpf');
    const rua = document.getElementById('rua');
    const numero = document.getElementById('numero');
    const cidade = document.getElementById('cidade');
    const telefone = document.getElementById('telefone');
    const botaoCliente = document.getElementById('btnSalvarCliente');
    botaoCliente.disabled = 1;

    function validarCliente() {

        if (nome.value == '' || cpf.value == '' || rua.value == '' || numero.value == '' || cidade.value == '' || telefone.value == '') {
            botaoCliente.disabled = 1;
        } else {
            botaoCliente.disabled = 0;
        }
    }
</script>

</html>