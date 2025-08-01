<?php

namespace DAL;

class Conexao
{
    private static $dbNome = 'Enciclopedia';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root'; 
    private static $dbSenha = '';     
    private static $cont = null;

    public static function conectar()
    {
        if (null == self::$cont) {
            try {
                self::$cont = new \PDO(
                    "mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbNome,
                    self::$dbUsuario,
                    self::$dbSenha
                );
            } catch (\PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar()
    {
        self::$cont = null;
        return self::$cont;
    }
}
?>
