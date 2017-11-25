<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1>Artículos en mi carrito</h1>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Marca</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($MODEL as $article) { 
            ?>
              <tr>
                <td><?=$article->getCode()?></td>
                <td><?=$article->getBrand()?></td>
                <td><?=$article->getDescription()?></td>
                <td><?=$article->getPrice()?></td>
                <td><?=$article->getQuantity()?></td>
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