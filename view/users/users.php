<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1>Usuarios</h1>
        <a href="?c=users&a=Create" class="btn btn-success">Crear</a>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover">
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
              foreach ($MODEL as $user) { 
            ?>
              <tr>
                <td><?=$user->getUsername()?></td>
                <td><?=$user->getName()?></td>
                <td><?=$user->getLastname()?></td>
                <td><?=$user->getPhone()?></td>
                <td><?=$user->getEmail()?></td>
                <td>
                  <a class="fa fa-eye btn btn-info btn-sm" href="?c=users&a=Details&id=<?=$user->getId()?>"></a>
                  <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=users&a=Edit&id=<?=$user->getId()?>"></a>
                  <a class="fa fa-trash btn btn-danger btn-sm" href="?c=users&a=Delete&id=<?=$user->getId()?>"></a>
                </td>
              </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>