<?php
error_reporting(E_ERROR | E_PARSE);
require_once("../model/banco.php");

    class editarCliente
    {
        private $editar;
        private $nome;
        private $cpf;
        private $rua;
        private $numero;
        private $cidade;
        private $telefone;
        private $alugado;

        public function __construct($id)
        {
            $this->editar = new Banco();
            $this->criar($id);
        }

        private function criar($id)
        {
            $row = $this->editar->pesquisarCliente($id);
            $this->nome         = $row['nome'];
            $this->cpf        = $row['cpf'];
            $this->rua   = $row['rua'];
            $this->numero        = $row['numero_casa'];
            $this->cidade        = $row['cidade'];
            $this->telefone        = $row['telefone'];
            $this->alugado        = $row['alugado'];
        }

        public function editarClientes($nome, $cpf, $rua, $numero, $cidade, $telefone, $alugado, $id)
        {
            if ($this->editar->updateClientes($nome, $cpf, $rua, $numero, $cidade, $telefone, $alugado, $id) == TRUE) {
                echo '<script>alert("Editado com sucesso"); window.location.href = "../view/index.php"</script>';
            } else {
                echo '<script>alert("Não foi possivel editar"); window.location.href = "../view/index.php"</script>';
            }
        }

        public function getNome()
        {
            return $this->nome;
        }
        public function getCpf()
        {
            return $this->cpf;
        }
        public function getRua()
        {
            return $this->rua;
        }
        public function getNumero()
        {
            return $this->numero;
        }
        public function getCidade()
        {
            return $this->cidade;
        }
        public function getTelefone()
        {
            return $this->telefone;
        }
        public function getAlugado()
        {
            return $this->alugado;
        }
    }

    $id = filter_input(INPUT_GET, 'id');
    $editar = new editarCliente($id);
    if (isset($_POST['editar'])) {
        $editar->editarClientes(htmlentities($_POST['nome']), htmlentities($_POST['cpf']), htmlentities($_POST['rua']), htmlentities($_POST['numero']),htmlentities($_POST['cidade']),htmlentities($_POST['telefone']),htmlentities($_POST['alugar']) ,htmlentities($_POST['id']));
    }

?>
