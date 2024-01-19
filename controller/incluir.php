<?php

error_reporting(E_ERROR | E_PARSE);

    if($_GET['op']=='cliente'){
        require_once("../model/cliente.php");
        class cadastrarCliente{

            private $cadastro;
    
            public function __construct()
            {
                $this->cadastro = new Cadastro();
                $this->incluirCliente();
            }
    
            private function incluirCliente(){
                $this->cadastro->setNome(htmlentities($_POST['nome']));
                $this->cadastro->setCpf(htmlentities($_POST['cpf']));
                $this->cadastro->setRua(htmlentities($_POST['rua']));
                $this->cadastro->setNumero(htmlentities($_POST['numero']));
                $this->cadastro->setCidade(htmlentities($_POST['cidade']));
                $this->cadastro->setTelefone(htmlentities($_POST['telefone']));
                $this->cadastro->setAlugado(htmlentities($_POST['alugado']));

                $result = $this->cadastro->incluirCliente();
                if($result==1){
                    echo "<script>alert('CLIENTE ADICIONADO COM SUCESSO'); window.location.href = '../view/index.php' </script>";
                }
                else{
                    echo "<script>alert('NÃO FOI POSSIVEL ADICIONAR CLIENTE '); window.location.href = '../view/index.php' </script>";
                }

            }
        }
        new cadastrarCliente();
    
    };



    if($_GET['op']=='livro'){
        require_once("../model/livro.php");
        class cadastrarLivro{

            private $cadastro;
    
            public function __construct()
            {
                $this->cadastro = new Cadastro();
                $this->incluirLivro();
            }
    
            private function incluirLivro(){
                $this->cadastro->setNome(htmlentities($_POST['nome']));
                $this->cadastro->setPreco(htmlentities($_POST['preco']));
                $this->cadastro->setAutor(htmlentities($_POST['autor']));
                $this->cadastro->setQuantidade(htmlentities($_POST['quantidade']));
    
                $result = $this->cadastro->incluirLivro();
                if($result >= 1){
                    echo "<script>alert('LIVRO INCLUÍDO COM SUCESSO'); window.location.href = '../view/index.php' </script>";
                }
                else{
                    echo "<script>alert('NÃO FOI POSSÍVEL ADICIONAR LIVRO'); window.location.href = '../view/index.php' </script>";
                }
            }
        }
        new cadastrarLivro();
    
    };


   

?>