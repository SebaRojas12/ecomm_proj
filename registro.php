<?php
    session_start();
    require_once 'config/conexion.php';
    include ('plantillas/nav.php');

?>




  <section class="vh-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" id="carta">
            <div class="card-body p-4 p-lg-5 text-black">
              <div class="d-flex align-items-center mb-3 pb-1">
                <span class="h1 fw-bold mb-0">Registro</span>
              </div>

              <h5 class="fw-normal " style="letter-spacing: 1px;">Crea una nueva cuenta:</h5>  
              <form action="procesos/procesarRegistro.php" class="d-flex flex-column pb-2" method="POST" >
                <div class="row">
                  <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="nombre">Nombre</label>
                      <input type="text" id="nombre" name="nombre" class="py-1 form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="apellido">Apellido</label>
                      <input type="text" id="apellido" name="apellido" class="py-1 form-control form-control-lg" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="username">Nombre de Usuario</label>
                      <input type="text" id="username" name="username" class="py-1 form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="telefono">Teléfono</label>
                      <input type="text" id="telefono" name="telefono" class="py-1 form-control form-control-lg" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="mail">E-Mail</label>
                      <input type="email" id="mail" name="mail" class="py-1 form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline mb-2">
                      <label class="form-label" for="contra">Contraseña</label>
                      <input type="password" id="contra" name="contra" class="py-1 form-control form-control-lg" />
                    </div>
                  </div>
                </div>
                <div>
                  <input  type="submit" value="Registrarse" class="py-3 btn btn-dark btn-lg btn-block mt-2">
                </div>
              </form>

              <div class="d-flex flex-column flex-lg-row align-items-center">
                
                <div class="d-flex flex-column flex-lg-row flex-fill align-items-center justify-content-lg-evenly mt-3 mt-lg-0 ">
                  <p class="mt-3">¿Ya tienes cuenta? <a style="color: #393f81;" href="login.php">¡Inicia sesión!</a></p>
                  <a href="#!" class="small text-muted">Términos de uso</a>
                  <a href="#!" class="small text-muted">Política de privacidad</a> 
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>








<?php
 
    include ('plantillas/footer.php');

?>