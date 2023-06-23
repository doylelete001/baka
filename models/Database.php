<?php
class Database
{
    private string $host;
    private string $database;
    private string $username;
    private string $password;
    private $conexao;

    public function __construct($host, $database, $username, $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;

    }
    public function connect()
    {
        $this->conexao = new mysqli($this->host, $this->username, $this->password, $this->database);
    
    if($this->conexao->connect_error){
        die("error in connection of database").$this->conexao;
    
    }
    }
    public function query($sql){
        $results=$this->conexao->query($sql);
        if(!$results){
            die("error in acess sql:" .$this->conexao->error);
        }
        return $results;
        }
        public function close(){
            $this->conexao->close();
        }

        public function getError(){
            return $this->conexao->error;
        }
   public function getLastInsertId(){
    return $this->conexao->insert_id;
   }
}