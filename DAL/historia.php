<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/DAL/conexao.php";
include_once $_SERVER['DOCUMENTE_ROOT'] . "/models/Historia.php";
use DAL\Conexao;

class historia{
  public function Selecao(): array{
    $sql = "select * from historia;";
    $conec = Conexao::conectar();
    $regis = $conec ->query($sql);
    $conec = Conexao::desconectar();
  }

}
