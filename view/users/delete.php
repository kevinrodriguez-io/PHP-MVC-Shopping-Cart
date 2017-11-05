<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Eliminar usuario</h1>
        <a href="?c=users">Regresar</a>
      </header>
      <div class="panel-body">
        <form action="?c=users&a=Delete" method="POST">
          <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
          <dl class="dl-horizontal">
            <dt>Nombre de usuario</dt><dd><?= $MODEL->getUsername() ?></dd>
            <dt>Correo electrónico</dt><dd><?= $MODEL->getEmail() ?></dd>
            <dt>Nombre</dt><dd><?= $MODEL->getName() ?></dd>
            <dt>Apellidos</dt><dd><?= $MODEL->getLastname() ?></dd>
            <dt>Cédula</dt><dd><?= $MODEL->getIdCard() ?></dd>
            <dt>Teléfono</dt><dd><?= $MODEL->getPhone() ?></dd>
            <dt>Rol</dt><dd><?= $MODEL->getRole() ?></dd>
          </dl>
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar usuario</button>
        </form>
      </div>
    </section>
  </div>
</div>