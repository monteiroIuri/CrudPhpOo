<?php

/**
 * Description of Conn
 *
 * @author Iuri Monteiro <iurigms@gmail.com>
 * @copyright (c) 2021, Iuri Monteiro
 * @link https://www.php-fig.org/psr/psr-12/#4-classes-properties-and-methods
 */

abstract class Conn {

    public $db = "mysql";
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "aulacelke";
    public $port = 3306;
    public $connect = null;
    
    public function connect() {
        try {
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';port='
            . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            
    
            //echo "Conectado.";
            
        return $this->connect;
        
        } catch (Exception $e) {
            //echo "ERRO: $e";
            
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato
               com o Administrador adm@empresa.com');
        }
    }
}
