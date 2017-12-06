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
        <table class="table table-striped table-hover">
          <thead>
            <tr>
            <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
              <th>Usuario</th>
            <?php } ?>
              <th>Código</th>
              <th>Marca</th>
              <th>Descripción</th>
              <th>Número de factura</th>
              <th>Fecha de venta</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($MODEL as $sale) { 
            ?>
              <tr>
                <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                  <td><?=$sale->getUsername()?></td>
                <?php } ?>
                <td><?=$sale->getCode()?></td>
                <td><?=$sale->getBrand()?></td>
                <td><?=$sale->getDescription()?></td>
                <td><?=$sale->getInvoiceNumber()?></td>
                <td><?=$sale->getSaleDate()?></td>
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