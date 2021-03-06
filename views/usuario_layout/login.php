
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ingreso</h1>
                  </div>
					<form class="user" action="login" method="post">
                    <div class="form-group">
						<input type="email" name="email" class="form-control form-control-user" id="" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
						<input type="password" name="password" class="form-control form-control-user" id="" placeholder="Password">
                    </div>                   
						
                       <button type="submit" class="btn btn-primary btn-block btn-user">Ingresar</button>
                    <hr>                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?=URL_BASE?>frontend/">¿Se te olvidó tu contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?=URL_BASE?>frontend/registro">¡Crea una cuenta!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
