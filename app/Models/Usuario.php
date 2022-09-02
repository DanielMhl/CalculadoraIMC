<?php

class Usuario
{
    private $id;
    private $nome;
    private $idade;
    private $sexo;
    private $peso;
    private $altura;
    private $imc;
    private $msg;
    private $erro = [];

    public function __construct($nome, $sexo, $idade, $peso, $altura)
    {
        $this -> nome = $nome;
        $this -> sexo = $sexo;
        $this -> idade = $idade;
        $this -> peso = $peso;
        $this -> altura = $altura;
    }

	public function getId()
    {
        return $this -> id;
    }
    public function setId($id){
        return $this -> id = $id;
    }

    public function getNome()
    {
        return $this -> nome;
    }
    public function setNome($nome){
        return $this -> nome = $nome;
    }

    public function getIdade()
    {
        return $this -> idade;
    }
    public function setIdade($idade){
        return $this -> idade = $idade;
    }

    public function getAltura()
    {
        return $this -> altura;
    }
    public function setAltura($altura){
        return $this -> altura = $altura;
    }


    public function getSexo()
    {
        return $this -> sexo;
    }
    public function setSexo($sexo){
        return $this -> sexo = $sexo;
    }

    public function getPeso()
    {
        return $this -> peso;
    }
    public function setPeso($peso){
        return $this -> peso = $peso;
    }

    public function getMsg()
    {
        return $this -> msg;
    }
    public function setMsg($msg){
        return $this -> msg = $msg;
    }

    public function getImc()
    {
        return $this -> imc;
    }
    public function setImc($imc){
        return $this -> imc = $imc;
    }
 

    public function validarDados(){
        if (empty($this -> nome)){
            $this->erro["erro_nome"] = "O campo nome está vazio!";
        }
        if($this->idade <0 || $this-> idade > 120 || !is_numeric($this->idade)){
            $this->erro["erro_idade"] = "Idade inválida!";
        }
        $this->peso = str_replace(",", ".", $this->peso);
        if(!is_numeric($this->peso)){
            $this->peso["erro_peso"] = "O peso deve ser um número";
        }
        $this->altura = str_replace(",", ".", $this->altura);
        if(!is_numeric($this->altura)){
            $this->altura["erro_altura"] = "A altura deve ser um número";
        }
        if (empty($this->erro)){
            $this->imc = $this->peso / pow($this->altura, 2);

            if ($this->imc < 18.5) {
                $this->msg = "Abaixo do peso";
            } elseif ($this->imc >= 18.5 && $this->imc <= 24.9) {
                $this->msg = "Peso Normal";
            } elseif ($this->imc >= 25 && $this->imc <= 29.9) {
                $this->msg = "Sobrepeso";
            } elseif ($this->imc >= 30 && $this->imc <= 34.9) {
                $this->msg = "Obesidade grau I";
            } elseif ($this->imc >= 35 && $this->imc <= 39.9) {
                $this->msg = "Obesidade grau II (Severa)";
            } else {
                $this->msg = "Obesidade grau III (Mórbida)";
            }
        }

    }


 }

    


?>