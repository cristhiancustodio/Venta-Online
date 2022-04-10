<?php 
    $server="127.0.0.1:3307";
    $db="entregableIA";
    $password="luisnunura123456";
    $usuario="root";
    try{
        $conn=new PDO("mysql:host=$server;dbname=$db",$usuario,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    catch (PDOException $ex){
        echo "Conexion fallida".$ex->getMessage();
    }
    /*class Conexion{
        
    
    public function __construct()
    {
        $this->server="127.0.0.1:3307";
        $this->db="entregableIA";
        $this->password="luisnunura123456";
        $this->usuario="root";
    } 
    public function getConnection(){
        try{
            $conn=new PDO("mysql:host=$this->server;dbname=$this->db",$this->usuario,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexion exitosa";
        }
        catch (PDOException $ex){
            echo "Conexion fallida".$ex->getMessage();
        }
        return $conn;
    }
    $stmt=$conn->prepare('call usp_verUsuario();');
    $stmt->execute();
    $row=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($row as $ra){
        echo "Nombre".$ra->usuario.'<br>';
        echo $ra->contraseña.'<br>';
        echo $ra->idUsuario.'<br>';
    }
}*/ 

?>
