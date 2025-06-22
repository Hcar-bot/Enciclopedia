<?php
  namespace DAL;
  use PDO;

  class conection{
   private static $nomedebug = 'enciclopedia';
   private static $hostdebug = 'localhost';
   private static $userdebug = 'root';
   private static $senhadebug = '';
   private static $cont = null;

   public static function conectar(): mixed{
      if (self::$cont == null){
        try{
            self::$cont = new PDO(dsn: "mysql:host=" . 
            self::$hostdebug . "; dbname=" . self::$nomedebug,
            username: self::$userdebug ,
            password: self::$senhadebug);
        } catch(\PDOException $exception){
            die($exception -> getMessage());
        }
      }
      return self::$cont;
   }
   public static function desconectar(): PDO{
      self::$cont = null;
      return self::$cont;
   }
  }
  ?>