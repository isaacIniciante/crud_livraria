<?php
error_reporting(E_ERROR | E_PARSE);
require_once("../model/banco.php");

    class editarLivro
    {
        private $editar;
        private $nome;
        private $preco;
        private $quantidade;
        private $autor;

        public function __construct($id)
        {
            $this->editar = new Banco();
            $this->criar($id);
        }

        private function criar($id)
        {
            $row = $this->editar->pesquisarLivro($id);
            $this->nome         = $row['nome'];
            $this->autor        = $row['autor'];
            $this->quantidade   = $row['quantidade'];
            $this->preco        = $row['preco'];
        }

        public function editarLivros($nome, $preco, $quantidade, $autor, $id)
        {
            if ($this->editar->updateLivro(htmlentities($nome), htmlentities($preco), htmlentities($quantidade), htmlentities($autor), $id) == TRUE) {
                echo '<script>alert("Editado com sucesso"); window.location.href = "../view/index.php"</script>';
            } else {
                echo '<script>alert("Não foi possivel editar"); window.location.href = "../view/index.php"</script>';
            }
        }

        public function getNome()
        {
            return $this->nome;
        }
        public function getPreco()
        {
            return $this->preco;
        }
        public function getQuantidade()
        {
            return $this->quantidade;
        }
        public function getAutor()
        {
            return $this->autor;
        }
    }

    $id = filter_input(INPUT_GET, 'id');
    $editar = new editarLivro($id);
    if (isset($_POST['editar'])) {
        $editar->editarLivros(htmlentities($_POST['nome']), htmlentities($_POST['preco']), htmlentities($_POST['quantidade']), htmlentities($_POST['autor']),$_POST['id']);
    }

?>
