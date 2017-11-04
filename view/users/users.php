<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Usuarios</h1>
        <a href="?c=users&a=Create" class="btn btn-success">Crear</a>
      </header>
      <div class="panel-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Nombre de usuario</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Teléfono</th>
              <th>Correo electrónico</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $results = User::GetAllUsers();
              foreach ($results as $user) { 
            ?>
              
            <?php 
              }
            ?>
          </tbody>
        </table>

      </div>
    </section>
  </div>
</div>