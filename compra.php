<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/compra.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
        <?php  session_start();
                if(!$_SESSION) {
                    include("header.php");
                }
                else{
                    include("header_logeado.php");
                }
        ?>
    
    
    <div class="container">
    <?php 
        include("BD/clsBD.php");
        $id_prod = (int)$_GET["id_produc"];
        $stmt = $conn->prepare("call usp_verUnicoProducto(?)");
        $stmt->bindParam(1,$id_prod);
        $stmt->execute();
        $row=$stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($row as $ra){
    ?>
        <form action="BD/controlador.php" method="POST" >
        <div class="producto">
            <div class="imagen-producto">
                <img src="img/<?php echo $ra->idProducto?>.jpg" alt="">
            </div>
            <div class="descripcion-producto">
                <div class="desc-cabecera">
                    <p><?php echo $ra->marca?></p>
                    <p id="desc-cabecera-cod" id="">cod: <?php echo $ra->idProducto?></p>
                </div>
                <div class="desc-nombre">
                    <p><?php echo $ra->descripcion?></p>
                </div>
                <div class="antes">
                    <p>Antes</p>
                    <strike style="color: #A6ACAF;"><p> <?php $pre_ant = $ra->precio ;
                        $pre_ant = ($ra->precio*120)/100;
                        ?> S/<?php echo $pre_ant ?></p></strike>
                </div>
                <div class="desc-precio">
                    <p>Precio Online</p>
                    <p>S/<?php echo $ra->precio?>.00</p>
                </div>
                <div class="cantidad">
                    <label for="inputCantidad" class="form-label">Cantidad &#32</label>
                    <input type="number" value="1" class="form-number" name="cantidad" id="inputCantidad" max="5" min="1">
                </div>

                <div>
                    <input type="text" value="<?php echo $ra->idProducto?>" name="idProducto" hidden>
                </div>
                <div class="btn">
                    <button name="btncomprar" type="submit"><i class="fa-solid fa-cart-shopping"></i>&#32 Agregar al carrito</button>
                </div>
            </div>
        </div>
        </form>
        <?php }?>
    </div>
    <footer >

    </footer>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>