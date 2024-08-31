<?php
    session_start();
    require_once 'config/conexion.php';
    include ('plantillas/nav.php');

?>

<body>
  <section class="h-100 bg-dark">
    <div class="container py-1 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" id="carta">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img id="foto" src="assets/login.png" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form  action="procesos/procesarLogin.php" method="POST">
  
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">Log In</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa a tu cuenta:</h5>
  
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" class="form-control form-control-lg py-2" name="email">
                    </div>
  
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="contra">Contraseña</label>
                      <input type="password" id="contra" class="form-control form-control-lg py-2" name="contra" >
                    </div>
  
                    <div class="py-2">            
                        <input type="submit" value="Ingresar" class="btn btn-primary btn-lg mt-3 py-2">
                    </div>
  
                    <a class="small text-muted" href="#!">¿Olvidaste tu contraseña?</a>
                    <p class="mb-2 pb-lg-2" style="color: #393f81;">¿No tienes cuenta?
                      <a href="registro.php">¡Regístrate!</a>
                    </p>
                    <a href="#!" class="small text-muted">Términos de uso.</a>
                    <br>
                    <a href="#!" class="small text-muted">Política de robo digo digo de privacidad</a>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>




<?php
 
    include ('plantillas/footer.php');

?>