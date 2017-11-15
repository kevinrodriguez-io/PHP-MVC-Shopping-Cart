<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Detalles de artículo</h1>
        <a href="?c=articles">Regresar</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Código</dt><dd><?= $MODEL->getCode() ?></dd>
          <dt>Marca</dt><dd><?= $MODEL->getBrand() ?></dd>
          <dt>Descripción</dt><dd><?= $MODEL->getDescription() ?></dd>
          <dt>Precio</dt><dd><?= $MODEL->getPrice() ?></dd>
          <dt>Cantidad</dt><dd><?= $MODEL->getQuantity() ?></dd>
        </dl>
      </div>
    </section>
  </div>
</div>