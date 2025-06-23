<?php

use models\Historia;
require_once __DIR__ . '/../models/Historia.php';

class ControlHistoria{
   private $historiaModel;

   public function __construct(){
    $this->historiaModel = new Historia();
   }
   public function listagemPub(): void{
    $historias = $this -> historiaModel -> lerTodos();
    require_once __DIR__ . '/../views/jogos/listajgs.php';
   }
   public function detailsJgs(): void{
      $id = $_GET['idH'] ?? null;
      if($id){
        if ($this->historiaModel->lerUm(id: $id)){
            $historia = $this ->  historiaModel;
            require_once __DIR__ . '/../views/jogos/listajgs.php';       
        }else {
            echo "<h1>História não encontrada</h1>";
                echo '<p><a href="index.php?action=listar_historia_publico" class="btn btn-secondary">Voltar para a lista</a></p>';
        }
      }

   }




}
