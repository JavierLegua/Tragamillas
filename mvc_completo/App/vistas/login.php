
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Log-In</title>
</head>

<body class="bg-primary">
<section class="vh-100 gradient-custom">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">

        <div class="card text-white justify-content-center align-items-center" style="border-radius: 1rem;" >
        
            <img src="<?php echo RUTA_URL?>/public/img/logo_tragamillas.png" alt="" width="291" height="217">
        
       
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-5 pb-5">
              <form action="datos_login.php" method="post">
                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Usuario (email)" required/>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="clave" id="clave" class="form-control form-control-lg" placeholder="Contraseña" />
                  
                </div>

                <input type="submit" class="mt-4 bg-primary btn btn-outline-light btn-lg px-5" value="Login">
              </form>
            </div>

        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>





 