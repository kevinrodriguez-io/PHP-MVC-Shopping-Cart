<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center login-title">Por favor ingrese sus datos para continuar</h1>
      <div class="account-wall">
        <img class="profile-img" src="assets/dtadmin/images/userneedslogin.png" alt="User needs login">
        <form class="form-signin" action="?c=authentication&a=Login" method="POST" >
          <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
          <input type="password" class="form-control" placeholder="Password" name="password" required />
          <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
          <a href="#" class="pull-right need-help">He olvidado mi contraseña </a><span class="clearfix"></span>
        </form>
      </div>
      <!-- <a href="#" class="text-center new-account">Registrarse</a> -->
    </div>
  </div>
</div>