<?php

require_once './models/Database';
require_once './models/User.php';
require_once './models/Dao.php';
require_once './controllers/UserDao';

$url= $_SERVER['$_REQUEST_URI'];

if(strpos($url, '/teste/hello') !== false){
    echo "hello";
}else if (strpos($url, 'teste/users') !== false) {
    $db=new Database('loacalhost','teste','root',"");
    $usuario=new UserDao($db);

    $method=$_SERVER['REQUEST_METHOD'];

    switch($method){
case 'GET':
    $usuarios=$usuario->read();
 foreach ($usuarios as $user) {
    echo "Id". $user->getId()."<br>";
    echo" Nome". $user->getName()."<br>";
    echo" Email". $user->getEmail()."<br>";
    echo" Senha". $user->getPassword()."<br>";
 }
 break;
 case 'POST':
    $nome=$_POST['name'];
    $email=$_POST['email'];
    $senha=$_POST['password'];
    $data=array(
        'name'=>$nome,
        'email'=>$email,
        'password'=>$senha
    );
    $createUser=$usuario->create($data);
   if ($createUser){
    echo 'Usuario criado com sucesso';  
   }else{
    echo 'Erro ao criar o usuario';
   }
   break;
   default:
   break;       
   case 'PATCH':
   
    $id=$_GET['id'];
    $data=file_get_contents('php//input');
    $parsedData=json_decode($data,true);

    $nome=$parsedData['name'];
    $email=$parsedData['email'];
    $dados=array(
        'name'=>$nome,
        'email'=>$email
    );
 }
 
 }
    
?>