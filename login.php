<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Únete</title>
</head>
<body>
    <h1>Ingresa a tu cuenta</h1>
    <div class="container">
        <form action="BD/controlador.php" method="post">
            
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
              <input type="text" name="txtusuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" name="txtpassword" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3 text-center ">
                <a href="register.php" class="fs-6">Crea tu cuenta</a>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit" class="btn btn-primary" value="Ingresar" name="btningresar">
            </div>          
        </form>
    </div>
</body>
</html>