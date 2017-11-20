<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1>Modificar usuario</h1>
        <a href="?c=users">Regresar</a>
      </header>
      <div class="panel-body">
        <form action="?c=users&a=Edit" method="POST" autocomplete="off">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="username">Usuario</label>
              <input value="<?= $MODEL->getUsername() ?>" type="text" class="form-control" id="username" name="username" placeholder="Usuario">
            </div>
            <div class="form-group col-md-4">
              <label for="password">Contraseña</label>
              <input value="<?= $MODEL->getPassword() ?>" type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Correo electrónico</label>
                <input value="<?= $MODEL->getEmail() ?>" type="email" class="form-control" id="email" name="email" placeholder="micorreo@midominio.com">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
              <input value="<?= $MODEL->getName() ?>" type="text" class="form-control" id="name" name="name" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Apellidos</label>
              <input value="<?= $MODEL->getLastname() ?>" type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellidos">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idCard">Cédula</label>
              <input value="<?= $MODEL->getIdCard() ?>" type="text" class="form-control" id="idCard" name="idCard" placeholder="Cédula">
            </div>
            <div class="form-group col-md-4">
              <label for="phone">Teléfono</label>
              <input value="<?= $MODEL->getPhone() ?>" type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono">
            </div>
            <div class="form-group col-md-2">
              <label for="role">Rol</label>
              <select name="role" id="role" class="form-control">
                <option value="CLIENT" <?= $MODEL->getRole() === 'CLIENT' ? 'selected="selected"' : ''?>>Cliente</option>
                <option value="ADMIN" <?= $MODEL->getRole() === 'ADMIN' ? 'selected="selected"' : ''?>>Administrador</option>
              </select>
              <!-- <input value="<?= $MODEL->getRole() ?>" type="text" class="form-control" id="role" name="role" placeholder="Rol"> -->
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">
              <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
              <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Modificar usuario</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>