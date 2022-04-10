<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tienda Online</title>
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
    

    <div class="container">
        <div class="productos">
            <!---->
                <?php include("BD/clsBD.php");
                $stmt = $conn->prepare("call usp_verProductos()");
                $stmt->execute();
                $row=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach($row as $ra){
                ?>
                <div class="card" style="width: 20rem;">
                    <img src="img/<?php echo $ra->idProducto?>.jpg" class="card-img-top" alt="...">
                
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $ra->marca ?></h5>
                    <p class="card-text"><?php echo $ra->descripcion?></p>
                        <div class="card-price">
                            <p><b>Online</b></p>
                            <p><b>S/<?php echo $ra->precio ?>.00</b> </p>
                        </div>
                        <div class="d-grid gap-1 col-8 mx-auto">
                            <input type="submit" value="Ver producto" onclick="location.href='compra.php?id_produc=<?php echo $ra->idProducto?>'">
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
    <footer>

    </footer>
</body>
</html>