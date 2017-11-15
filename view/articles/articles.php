<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1>Artículos</h1>
        <a href="?c=articles&a=Create" class="btn btn-success">Crear</a>
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
              <th></th>
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
                <td>
                  <a class="fa fa-eye btn btn-info btn-sm" href="?c=articles&a=Details&id=<?=$article->getId()?>"></a>
                  <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=articles&a=Edit&id=<?=$article->getId()?>"></a>
                  <a class="fa fa-trash btn btn-danger btn-sm" href="?c=articles&a=Delete&id=<?=$article->getId()?>"></a>
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