<?php

namespace MODEL;

use DateTime; 

class Historia
{
    private ?int $idH;
    private ?string $nomeH;
    private ?string $generoH;
    private ?string $descricaoH;
    private ?string $data_addH;   
    private ?string $data_updateH;

    public function __construct(
        ?int $idH = null,
        ?string $nomeH = null,
        ?string $generoH = null,
        ?string $descricaoH = null,
        ?string $data_addH = null,
        ?string $data_updateH = null
    ) {
        $this->idH = $idH;
        $this->nomeH = $nomeH;
        $this->generoH = $generoH;
        $this->descricaoH = $descricaoH;
        $this->data_addH = $data_addH;
        $this->data_updateH = $data_updateH;
    }

    public function getId(): ?int {
        return $this->idH;
    }

    public function getNome(): ?string {
        return $this->nomeH;
    }

    public function getGen(): ?string {
        return $this->generoH;
    }

    public function getDesc(): ?string {
        return $this->descricaoH;
    }

    public function getDataAdd(): ?string {
        return $this->data_addH;
    }

    public function getDataUpdate(): ?string { 
        return $this->data_updateH;
    }


    public function setId(?int $idH): void {
        $this->idH = $idH;
    }

    public function setNome(?string $nomeH): void {
        $this->nomeH = $nomeH;
    }

    public function setGen(?string $generoH): void {
        $this->generoH = $generoH;
    }

    public function setDesc(?string $descricaoH): void {
        $this->descricaoH = $descricaoH;
    }

    public function setDataAdd(?string $data_addH): void { 
        $this->data_addH = $data_addH;
    }

    public function setDataUpdate(?string $data_updateH): void { 
        $this->data_updateH = $data_updateH;
    }
}