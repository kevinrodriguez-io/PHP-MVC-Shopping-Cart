<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Detalles de usuario</h1>
        <a href="?c=users">Regresar</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Nombre de usuario</dt><dd><?= $MODEL->getUsername() ?></dd>
          <dt>Correo electrónico</dt><dd><?= $MODEL->getEmail() ?></dd>
          <dt>Nombre</dt><dd><?= $MODEL->getName() ?></dd>
          <dt>Apellidos</dt><dd><?= $MODEL->getLastname() ?></dd>
          <dt>Cédula</dt><dd><?= $MODEL->getIdCard() ?></dd>
          <dt>Teléfono</dt><dd><?= $MODEL->getPhone() ?></dd>
          <dt>Rol</dt><dd><?= $MODEL->getRole() ?></dd>
        </dl>
      </div>
    </section>
  </div>
</div>