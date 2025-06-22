<?php

namespace models;
use DateTime;

class Historia{
    private ?int $idH;
    private ?string $nomeH;
    private ?string $generoH;
    private ?string $descricaoH;
    private ?DateTime $data_addH;
    private ?DateTime $data_updateH;

    public function __construct(){

    }
    
    public function getId(): int|null{
        return $this -> idH;
    }
    public function setId(int $idH): void{
        $this -> idH = $idH;
    }
    public function getNome(): string|null{
        return $this -> nomeH;
    }
    public function setNome(string $nomeH): void{
        $this -> nomeH = $nomeH;
    }
    public function getDesc(): string|null{
        return $this -> descricaoH;
    }
    public function setDesc(string $descricaoH): void{
        $this -> descricaoH = $descricaoH;
    }    
    public function getGen(): string|null{
        return $this -> generoH;
    }
    public function setGen(string $generoH): void{
        $this -> generoH = $generoH;
    }   
    public function getDataAdd(): DateTime|null{
        return $this -> data_addH;
    }
    public function setDataAdd(DateTime $data_addH): void{
        $this -> data_addH = $data_addH;
    }
    public function getDataUpdate(): DateTime|null{
        return $this -> data_updateH;
    }
    public function setDataUpdate(DateTime $data_updateH): void{
        $this -> data_updateH = $data_updateH;
    }
}

?>