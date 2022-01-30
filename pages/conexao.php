<?php

/*
 * ///////////////////////////////////////////////////////////////////////
 * /////   SISTEMA DESENVOLVIDO POR HAMILTON BOTUELHO PINHEIRO ROSA   ////
 * ///////////////////////////////////////////////////////////////////////
 *
 */

require_once "../config_banco.php";

class Conexao
{
    private static $connect = "null";

    private static function Conectar()
    {
        try {

            self::$connect = new PDO('mysql:host=' . HOST . ';dbname=' . DB .  ';charset=utf8', USER, PASS);
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            echo "<div class='erro'>SEM ACESSO AO BANCO DE DADOS</div>";
            die;
        }
        return self::$connect;
    }
    public function getConn()
    {
        return self::Conectar();
    }
}
