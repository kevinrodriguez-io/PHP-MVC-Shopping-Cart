<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Crear usuario</h1>
        <a href="?c=users">Regresar</a>
      </header>
      <div class="panel-body">
        <form action="?c=users&a=Create" method="POST">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="username">Usuario</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
            </div>
            <div class="form-group col-md-4">
              <label for="password">Contraseña</label>
              <input type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="micorreo@midominio.com">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <label for="name">Apellidos</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellidos">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idCard">Cédula</label>
              <input type="text" class="form-control" id="idCard" name="idCard" placeholder="Cédula">
            </div>
            <div class="form-group col-md-4">
              <label for="phone">Teléfono</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono">
            </div>
            <div class="form-group col-md-2">
              <label for="role">Rol</label>
              <input type="text" class="form-control" id="role" name="role" placeholder="Rol">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> Crear usuario</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>