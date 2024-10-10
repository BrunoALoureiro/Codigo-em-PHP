<?php
class Funcionario
{
    // Atributos privados
    private $nomeCompleto;
    private $dataNascimento;
    private $funcao;
    private $telefone;
    private $corDeFundo;
    private $email;
    private $salarioLiquido;
    private $salarioBruto;

    // Métodos GET
    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getFuncao()
    {
        return $this->funcao;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getCorDeFundo()
    {
        return $this->corDeFundo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSalarioLiquido()
    {
        return $this->salarioLiquido;
    }

    public function getSalarioBruto()
    {
        return $this->salarioBruto;
    }

    // Métodos SET
    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setCorDeFundo($corDeFundo)
    {
        $this->corDeFundo = $corDeFundo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSalarioLiquido($salarioLiquido)
    {
        $this->salarioLiquido = $salarioLiquido;
    }

    public function setSalarioBruto($salarioBruto)
    {
        $this->salarioBruto = $salarioBruto;
    }

    // Método para calcular o desconto
    public function calculaDesconto()
    {
        return $this->salarioBruto - $this->salarioLiquido;
    }
}
