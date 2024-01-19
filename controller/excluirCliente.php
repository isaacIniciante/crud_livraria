<?php

require_once "../model/banco.php";

class excluir
{
    private $excluir;

    public function __construct($id)
    {
        $this->excluir = new Banco();
        if ($this->excluir->excluirCliente($id) == TRUE) {
            echo "<script> alert('Excluido com sucesso!!') </script>";
            echo "<script> window.location.href = '../view/index.php' </script>";
        } else {
            echo "<script> alert('Não foi possivel excluir!!') </script>";
            echo "<script> window.location.href = '../view/index.php' </script>";
        }
    }
}

$id = $_GET['id'];
new excluir($id);