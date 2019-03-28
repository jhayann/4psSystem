<?php


class User {
    
    private $con;
    
    public function __construct($db)
    {
        $this->con = $db;
    }
    
    public function read($id='')
    {
        
    }
    
    
    public function create($data = array())
    {
        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $role = $data['role'];
        
            $query = "INSERT INTO 
                        users(username, password, role)
                      VALUES 
                        (?,?,?)";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("sss",$username,$password,$role);
            if($stmt->execute())
            {
                return true;
            } else {
                return false;
            }
            
        
    }
    
    
}