<?php

require_once('banco.php');

class Cadastro extends Banco
{
    private $nome;
    private $quantidade;
    private $preco;
    private $autor;

    //setters
    public function setNome($string)
    {
        $this->nome = $string;
    }
    public function setAutor($string)
    {
        $this->autor = $string;
    }
    public function setQuantidade($string)
    {
        $this->quantidade = $string;
    }
    public function setPreco($string)
    {
        $this->preco = $string;
    }

    //getters

    public function getAutor()
    {
        return $this->autor;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function incluirLivro(){
        return $this->setLivro($this->getNome(),$this->getPreco(),$this->getQuantidade(),$this->getAutor());
    }
    
}
