<?php

class Member {
    
    private $con;
    public $data = array();
    public function __construct($db)
    {
        $this->con = $db;
    }
    
    public function create($member = array())
    {
     
        $fname = $member['firstname'];
         $lname = $member['lastname'];
         $mname = $member['middlename'];
         $gender = $member['gender'];
         $civil = $member['civil'];
         $barrio = $member['barrio']; 
        
        $query = "INSERT INTO members(lastname, firstname, middlename, gender, civil_status, barrio)
                        VALUES(?,?,?,?,?,?)";
        $stmt= $this->con->prepare($query) or ($_SESSION['error'] = $this->con->error);
        $stmt->bind_param("ssssss",$lname,$fname,$mname,$gender,$civil,$barrio);
        if($stmt->execute())
        {
             $_SESSION['success'] = "New member sucessfully added";
            return true;
        } 
        else
        {
              $_SESSION['error'] = "Failed to add member." . $stmt->error;
            return false;
        }
        
    }
    
    public function read($id=null)
    {
        if($id == null)
        {
            $query = "SELECT * FROM members WHERE status ='active'";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $res = $stmt->get_result();
            while($r = $res->fetch_assoc())
            {
             $this->data[] = $r;   
            }
            
           
        } else {
           $query = "SELECT * FROM members WHERE member_id = ?";
            $stmt = $this->con->prepare($query);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $res = $stmt->get_result();
            while($r = $res->fetch_assoc())
            {
             $this->data[] = $r;   
            } 
        } 
         return json_encode($this->data);
    }
    
     
    public function inactive()
    {
      
           $query = "SELECT * FROM members WHERE status ='inactive'";
            $stmt = $this->con->prepare($query);           
            $stmt->execute();
            $res = $stmt->get_result();
            while($r = $res->fetch_assoc())
            {
             $this->data[] = $r;   
            } 
       
         return json_encode($this->data);
    }
    
    public function countMember($barrio)
    {
        $query="SELECT member_id FROM members WHERE barrio = ? AND status = 'active'";
        $stmt = $this->con->prepare($query) or die ($this->con->error);
        $stmt->bind_param("s",$barrio);
        $stmt->execute();
        $res = $stmt->get_result();
       
        echo $res->num_rows . ' Members';
    }
    
    public function membertotal()
    {
        $query="SELECT member_id FROM members WHERE status = 'active'";
        $stmt = $this->con->prepare($query) or die ($this->con->error);
        $stmt->execute();
        $res = $stmt->get_result();
       
        echo $res->num_rows . ' in Total';
    }
    
    public function update($member = array())
    {
        
        $fname = $member['firstname'];
         $lname = $member['lastname'];
         $mname = $member['middlename'];
         $gender = $member['gender'];
         $civil = $member['civil'];
         $barrio = $member['barrio']; 
        $id = $member['id'];
        
          $query = "UPDATE members SET lastname = ?, firstname = ?, middlename = ?, gender = ?, civil_status = ?, barrio =? WHERE member_id =?";
        $stmt= $this->con->prepare($query) or ($_SESSION['error'] = $this->con->error);
        $stmt->bind_param("ssssssi",$lname,$fname,$mname,$gender,$civil,$barrio,$id);
        if($stmt->execute())
        {
             $_SESSION['success'] = "Member sucessfully updated";
            return true;
        } 
        else
        {
              $_SESSION['error'] = "Failed to add member." . $stmt->error;
            return false;
        }
    }
    
    public function disable($id)
    {
        $query = "UPDATE members SET status = 'inactive' WHERE member_id = ?";
        $stmt= $this->con->prepare($query) or ($_SESSION['error'] = $this->con->error);
        $stmt->bind_param("i",$id);
        if($stmt->execute())
        {
             $_SESSION['success'] = "Member account status was set to inactive";
            return true;
        } 
        else
        {
              $_SESSION['error'] = "Failed to update account status." . $stmt->error;
            return false;
        }
        
    }
    
    public function chart()
    {
        $get = $this->con->prepare("SELECT barrio, count(barrio) as total FROM members WHERE status = 'active' GROUP by barrio");
        $get->execute();
        $results = $get->get_result();
        $data = array();
        foreach ($results as $row) {
        $data[] = $row;
        }
        print json_encode($data);
    }
}