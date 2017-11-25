<div class="row">
<div class="col-lg-6">
  <section class="panel">
    <header class="panel-heading">
      <h1>Comprar artículo</h1>
      <a href="?c=articles">Regresar</a>
    </header>
    <div class="panel-body">
      <form action="?c=articles&a=Buy" method="POST">
        <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
        <dl class="dl-horizontal">
          <dt>Código</dt><dd><?= $MODEL->getCode() ?></dd>
          <dt>Marca</dt><dd><?= $MODEL->getBrand() ?></dd>
          <dt>Descripción</dt><dd><?= $MODEL->getDescription() ?></dd>
          <dt>Precio</dt><dd><?= $MODEL->getPrice() ?></dd>
          <dt>Cantidad</dt><dd><?= $MODEL->getQuantity() ?></dd>
        </dl>
        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-cart-plus"></i> Agregar al carrito</button>
      </form>
    </div>
  </section>
</div>
</div>
