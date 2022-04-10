<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Lista de compras</title>
</head>
<body>
    <?php   session_start();
            if(!$_SESSION) {
                include("header.php");
            }
            else{
                include("header_logeado.php");
            }
    ?>
    <div class="tabla">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Marca</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include("BD/clsBD.php");
                $idUsuario = $_SESSION["idUsuario"];
                $stmt = $conn->prepare("call usp_ListaCompras(?)");
                $stmt->bindParam(1,$idUsuario);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_OBJ);
                $suma = 0;
                foreach($row as $ra){
                    $suma += $ra->subtotal;
                    
            ?>
            <tr>
                <td><?php echo $ra->usuario?></td>
                <td><?php echo $ra->marca?></td>
                <td><?php echo $ra->descripcion?></td>
                <td><?php echo $ra->cantidad?></td>
                <td><?php echo $ra->precio?></td>
                <td><?php echo $ra->subtotal?></td>
            </tr>
            <?php } ?>
            <tr class="table-success"> 
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $suma?></td>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>