<?php 
class UserDao implements Dao{

    private $db;
    public function __construct(Database $db){
        $this-> db=$db;
    }
        public function create($data){
            $nome=$data['name'];
            $email=$data['email'];
            $senha=$data['password'];

            $sql="INSERT INTO user(name,email,password) VALUES
             ('$nome','$email''$senha')";

             $this->db->connect();
             $result=$this->db->query($sql);
             $id=$this->db->getLastInsertId();
             $this->db->close();
             if($result){
                return new User($id,$nome,$email,$senha);
             }else {
            die("error in create new user :" .$this->db->getError());
             }
        }

        public function read(){
        $sql="SELECT * FROM user ";
        $this->db->connect();
        $result=$this->db->query($sql);
        $users=array();
        if($result && $result-> num_rows>0){
            while($row=$result->fetch_assoc());
            $user = new User($row['id'],$row['name'],$row['email'],['password']);
            $users[]=$user;
        }
    
    $this->db->close();
    return$users;
    }
        public function update($id,$data){
  $nome=$data['name'];
  $email=$data['email'];
  $sql="UPDATE user SET name= '$nome',email='$email WERE id =$id";
  $this->db->connect();
  $result=$this->db->query($sql);
  $this->db->close();
  return $result;
        }
        public function delete($id){
 $sql= "DELETE FROM user WHERE id=$id";
 $this->db->connect();
 $result=$this->db->query($sql);
 $this->db->close();
 return $result;
        }

    }