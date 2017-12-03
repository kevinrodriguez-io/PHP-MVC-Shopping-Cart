<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
          <h1>Ventas</h1>
        <?php } else { ?>
          <h1>Mi historial de compras</h1>
        <?php } ?>
      </header>
      <div class="panel-body">
      </div>
    </section>
  </div>
</div>