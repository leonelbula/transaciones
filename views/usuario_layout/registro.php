<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">¡Crea una cuenta!</h1>
              </div>
				<form class="user" method="post" action="<?=URL_BASE?>home/registrousuario">
                <div class="form-group">                 
                    <input type="text" class="form-control form-control-user" name="regUsuario" id="FirstName" placeholder="Nombre de Usuario">                                   
                </div>
                <div class="form-group">
					<input type="email" class="form-control form-control-user" name="regEmail" id="InputEmail" placeholder="Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
					  <input type="password" class="form-control form-control-user" name="regPassword" id="InputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
					  <input type="password" class="form-control form-control-user" name="" id="RepeatPassword" placeholder="Repetir Password">
                  </div>
                </div>
				  <input type="submit" class="btn btn-primary btn-user btn-block" value="Registrar" />
                
                <hr>                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?=URL_BASE?>frontend/">¿Se te olvidó tu contraseña?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=URL_BASE?>frontend/ingreso">Ingresa</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>