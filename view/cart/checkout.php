<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Confirmación requerida</h1>
        <a href="?c=cart">Regresar</a>
      </header>
      <div class="panel-body">
        <div class="alert alert-info">
          Al continuar aceptas realizar la compra de los siguentes artículos:
        </div>
        <ul>
          <?php foreach($MODEL as $article) { ?>
            <li>
              <b><?=$article->getBrand()?> - <?=$article->getDescription()?>: </b><?=$article->getPrice()?>
            </li>
          <?php } ?>
        </ul>
        <div>
          <b>Total:</b> <?= array_sum(array_map(function ($element) { return $element->getPrice(); }, $MODEL));?>
        </div>
        <div class="m-top15">
          <button class="btn btn-block btn-lg btn-success"><i class="fa fa-shield"></i> Realizar compra</button>
        </div>
    </section>
  </div>
</div>