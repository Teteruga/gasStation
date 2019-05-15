<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author Vinicus
 */
class Conexao {
    
    private static $conexao;
 
    private function __construct()
    {}
 
    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            self::$conexao = new \PDO('mysql:host=localhost;port=3306;dbname=projeto_mvc', 'root', '123456');
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
        }
        return self::$conexao;
    }
}
