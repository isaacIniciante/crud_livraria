<?php

    require_once 'banco.php';

    class Cadastro extends Banco {
        private $nome;
        private $cpf;
        private $rua;
        private $numero;
        private $cidade;
        private $telefone;
        private $alugado;

        public function setNome($string){
            $this->nome = $string;
        }
        public function setCpf($string){
            $this->cpf = $string;
        }
        public function setRua($string){
            $this->rua = $string;
        }
        public function setNumero($string){
            $this->numero = $string;
        }
        public function setCidade($string){
            $this->cidade = $string;
        }
        public function setTelefone($string){
            $this->telefone = $string;
        }
        public function setAlugado($string){
            $this->alugado = $string;
        }

        public function getNome(){
            return $this->nome;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function getRua(){
            return $this->rua;
        }
        public function getNumero(){
            return $this->numero;
        }
        public function getCidade(){
            return $this->cidade;
        }
        public function getTelefone(){
            return $this->telefone;
        }
        public function getAlugado(){
            return $this->alugado;
        }

        public function incluirCliente(){
            return $this->setCliente($this->getNome(),$this->getCpf(),$this->getRua(),$this->getNumero(),$this->getCidade(),$this->getTelefone(),$this->getAlugado());
        }


    }

?>