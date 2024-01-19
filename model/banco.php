<?php
require_once('../conexao.php');
class Banco
{
    protected $mysqli;

    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {
        $this->mysqli = new mysqli(servidor, usuario, senha, banco);
    }

    //incluir LIVRO
    public function setLivro($nome, $preco, $quantidade, $autor)
    {

        $result = $this->mysqli->query("SELECT * FROM livros WHERE nome='$nome'");
        $verifica = $result->fetch_array(MYSQLI_ASSOC);


        if ($verifica['nome'] == FALSE) {
            $query = $this->mysqli->prepare("INSERT INTO livros (`nome`,`preco`,`quantidade`,`autor`) VALUES (?,?,?,?)");
            $query->bind_param("ssss", $nome, $preco, $quantidade, $autor);
            if ($query->execute() == TRUE) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "<script>alert('Já existe um livro cadastrado com este nome'); window.location.href = '../view/index.php'</script>";
        }
    }

    //SELECIONAR LIVROS
    public function getLivro()
    {
        $result = $this->mysqli->query("SELECT * FROM livros");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    //DELETAR LIVROS
    public function excluirLivro($id)
    {
        if ($this->mysqli->query("DELETE FROM `livros` where `id` = '" . $id . "';") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //PESQUISAR LIVROS
    public function pesquisarLivro($id)
    {
        $result = $this->mysqli->query("SELECT * FROM livros WHERE nome='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    //ATUALIZAR  LIVROS
    public function updateLivro($nome, $preco, $quantidade, $autor, $id)
    {
        $query = $this->mysqli->prepare("UPDATE `livros` SET `nome` = ?, `preco`=?, `quantidade` = ?, `autor`=? WHERE `nome` = ?");
        $query->bind_param("sssss", $nome, $preco, $quantidade, $autor, $id);
        if ($query->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }



    //incluir Cliente
    public function setCliente($nome, $cpf, $rua, $numero, $cidade, $telefone, $alugado)
    {

        $result = $this->mysqli->query("SELECT * FROM clientes WHERE cpf='$cpf'");
        $verifica = $result->fetch_array(MYSQLI_ASSOC);


        if ($verifica['cpf'] == FALSE) {
            $query = $this->mysqli->prepare("INSERT INTO clientes (`nome`,`cpf`,`rua`,`numero_casa`,`cidade`,`telefone`,`alugado`) VALUES (?,?,?,?,?,?,?)");
            $query->bind_param("sssssss", $nome, $cpf, $rua, $numero, $cidade, $telefone, $alugado);
            if ($query->execute() == TRUE) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "<script>alert('Já existe um cliente cadastrado com este CPF'); window.location.href = '../view/index.php'</script>";
        }
    }

    //SELECIONAR CLIENTES
    public function getClientes()
    {
        $result = $this->mysqli->query("SELECT * FROM clientes");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    //PESQUISAR CLIENTES
    public function pesquisarCliente($id)
    {
        $result = $this->mysqli->query("SELECT * FROM clientes WHERE cpf='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    //ATUALIZAR  CLIENTES
    public function updateClientes($nome, $cpf, $rua, $numero, $cidade, $telefone, $alugado, $id)
    {
        $query = $this->mysqli->prepare("UPDATE `clientes` SET `nome` = ?, `cpf`=?, `rua` = ?, `numero_casa`=?, `cidade`=?, `telefone`=?, `alugado`=? WHERE `nome` = ?");
        $query->bind_param("ssssssss", $nome, $cpf, $rua, $numero, $cidade, $telefone, $alugado, $id);
        if ($query->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //DELETAR LIVROS
    public function excluirCliente($id)
    {
        if ($this->mysqli->query("DELETE FROM `clientes` where `cpf` = '" . $id . "';") == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
