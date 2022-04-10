<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Registrate</title>
</head>
<body>
    <div class="text-center">
        <h1>Registrate</h1>
    </div>
    <div class="container" id="form-register">

        <form action="BD/controlador.php" method="post" class="row g-3">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Usuario</label>
              <input type="text" class="form-control" id="inputEmail4" name="usuario"  required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control" id="inputPassword4" name="txtpassword" required>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="inputAddress"  name="nombre" required>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="inputAddress2" name="apellido" required>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Ciudad</label>
              <input type="text" class="form-control" id="inputCity" name="ciudad" required>
            </div>
            <div class="col-md-6">
                <label for="inputDni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="inputDni" name="dni" required>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <input type="submit" value="Registrar" class="btn btn-primary" name="enviar">
                
            </div>      
          </form>
    </div>
</body>
</html>