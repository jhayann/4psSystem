<?php

class Database {
    /*
    REMOTE SERVER CONNECTION
    private $server = 'localhost';
    private $username = 'id8975546_pantawid';
    private $password = 'Passmein07';
    private $dbname = 'id8975546_patawid_db';
    */
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = '4ps_db';
    public $con;
    
    public function connect()
    {
        $this->con = null;
        
        $this->con = new mysqli($this->server, $this->username, $this->password, $this->dbname) or die($this->con->error);
        
        return $this->con;
    }
    
    
    
    
}