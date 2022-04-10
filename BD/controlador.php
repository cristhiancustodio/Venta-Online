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
    function registrarUsuario(){
        try {
            GLOBAL $conn;
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $usuario = $_POST["usuario"];
            $password = $_POST["txtpassword"];
            $ciudad = $_POST["ciudad"];
            $dni = $_POST["dni"];
            $stmt = $conn->prepare("call usp_CrearUsuario(?,?,?,?,?,?)");
            $stmt -> execute([$usuario,$password,$nombre,$apellido,$ciudad,$dni]);
        } catch (Exception $e) {
            echo "Error en registrar usuario ".$e->getMessage();
        }
       

    }
    function loginUsuario(){
        try {
            GLOBAL $conn;
            $usuario = $_POST["txtusuario"];
            $pass =  $_POST["txtpassword"];
            $stmt = $conn -> prepare("call usp_verUsuario(?)");
            $stmt->bindParam(1,$usuario);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach($row as $ra){
                if($ra->contraseña == $pass and $ra->usuario == $usuario){
                    session_start();
                    $_SESSION["idUsuario"] = $ra->idUsuario;
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["nombre"] = $ra->nombre;
                    header("Location:../index.php");
                }
                elseif($ra->usuario != $usuario){
                    echo "Usuario no existe";
                }
                else{
                    echo "error al ingresar";
                }
            }
        } catch (Exception $e) {
            echo "Error en ingresar ".$e->getMessage();
        }
    }
    function Comprar(){
        GLOBAL $conn;
        session_start();
        if (!$_SESSION){
            echo "Porfa inicia sesion";
        }
        else{
            try{
            $idUsuario = (int)$_SESSION["idUsuario"];
            $idProducto = (int)$_POST["idProducto"];
            $cantidad = (int)$_POST["cantidad"];
            $stmt = $conn -> prepare("call usp_insertCompra(?,?,?)");
            $stmt->execute([$idUsuario,$idProducto,$cantidad]);
            header("Location:../index.php");
            }
            catch(Exception $e){
                echo "Error en registrar compra".$e->getMessage();
            }
        }
    }



    if (isset($_POST["enviar"])){
        registrarUsuario();
        header("Location:../login.php");
    }
    else if(isset($_POST["btningresar"])){
        loginUsuario();
    }
    else if(isset($_POST["btncomprar"])){
        Comprar();
    }
?>
