<?php

require_once '../model/banco.php';

class exibirLivros
{
    private $exibir;

    public function __construct()
    {
        $this->exibir = new Banco();
        $this->exibirListaLivros();
    }

    private function exibirListaLivros()
    {
        $row = $this->exibir->getLivro();
        if($row == ''){
            echo "<div class='col-12 text-center'> Nenhum livro disponível </div>";
        }
        else{
            foreach ($row as $lista) {
                $cor = 'bg-white';
                if($lista['quantidade']<1){
                    $cor = 'bg-secondary text-white';
                }
                else{
                    $cor = 'bg-success text-white';
                }
                echo "<div class='col-12 text-center $cor mt-2 py-3 h3'";
    
                    echo "<b>{$lista['nome']}</b><br>";
                    echo "Preço dia: R$ <b>{$lista['preco']}</b><br>";
                    echo "<a class='btn btn-dark col-6 mt-3' href='editarLivro.php?id=".htmlentities($lista['nome'])."&op=livro'>Editar</a><a class='btn btn-danger col-6 mt-3' href='../controller/excluirLivro.php?id=".htmlentities($lista['id'])."'>Excluir</a>";
                                
                echo "</div>";
            }
        }
    }
}

class exibirClientes
{
    private $exibir;

    public function __construct()
    {
        $this->exibir = new Banco();
        $this->exibirListaClientes();
    }

    private function exibirListaClientes()
    {
        $row = $this->exibir->getClientes();
        if($row == ''){
            echo "<div class='col-12 text-center'> Nenhum cliente adicionado </div>";
        }
        else{

            foreach ($row as $lista) {
                $cor = 'bg-white';
                if($lista['alugado']==''){
                    $cor = 'bg-secondary text-white';
                }
                else{
                    $cor = 'bg-success text-white';
                }
                echo "<div class='col-12 text-center $cor mt-2 py-3'";
    
                        echo "<b>{$lista['nome']}</b><br>";
                        echo "<b class='ml-3'>CPF: {$lista['cpf']}</b>";
                        echo "<b class='ml-3'>| Alugado: {$lista['alugado']}</b>";
                        echo "<br>";
                   
                    echo "<a class='btn btn-dark col-6 mt-3' href='editarCliente.php?id=".$lista['cpf']."'>Editar/Ver Dados</a><a class='btn btn-danger col-6 mt-3' href='../controller/excluirCliente.php?id=".$lista['cpf']."'>Excluir</a>";
                                
                echo "</div>";
            }
        }
    }
}


class exibirLivrosDisponiveisParaLocacao
{
    private $exibir;

    public function __construct()
    {
        $this->exibir = new Banco();
        $this->exibirLivrosDisponiveisParaLocacao();
    }

    private function exibirLivrosDisponiveisParaLocacao()
    {
        $row = $this->exibir->getLivro();
        foreach ($row as $lista) {
            echo "<option value='{$lista['nome']}'> {$lista['nome']} - R$ {$lista['preco']} DIA <option>";
        }
    }
}
?>


