<?php

class Auth {
    
    private $con;
    
    public function __construct($db)
    {
        $this->con = $db;
    }
    
    
    public function authenticate($user = array())
    {
        $username = $user['email'];
        $password = $user['password'];
        
            $query = "SELECT 
                        username, password
                      FROM 
                        users
                      WHERE 
                        username = ?
                      LIMIT 0, 1";
       
            $stmt = $this->con->prepare($query) or die($this->con->error);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $res = $stmt->get_result();
            $r = $res->fetch_assoc();
                $hash = $r['password'];
                if(password_verify($password, $hash))
                {
                    $_SESSION['username'] = $username;
                    return true;
                } else {
                    $_SESSION['error'] = "INVALID USERNAME OR PASSWORD";
                    return false;
                }
    }
    
    
    
}