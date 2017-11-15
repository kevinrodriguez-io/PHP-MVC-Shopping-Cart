<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Modificar artículo</h1>
        <a href="?c=articles">Regresar</a>
      </header>
      <div class="panel-body">
        <form action="?c=articles&a=Edit" method="POST" autocomplete="off">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="code">Código</label>
              <input value="<?= $MODEL->getCode() ?>" type="text" class="form-control" id="code" name="code" placeholder="Código">
            </div>
            <div class="form-group col-md-4">
              <label for="brand">Marca</label>
              <input value="<?= $MODEL->getBrand() ?>" type="text" class="form-control" id="brand" name="brand" placeholder="Marca">
            </div>
            <div class="form-group col-md-4">
              <label for="description">Descripción</label>
              <input value="<?= $MODEL->getDescription() ?>" type="text" class="form-control" id="description" name="description" placeholder="micorreo@midominio.com">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">Precio</label>
                <input value="<?= $MODEL->getPrice() ?>" type="text" class="form-control" id="price" name="price" placeholder="Precio">
            </div>
            <div class="form-group col-md-6">
              <label for="quantity">Cantidad</label>
              <input value="<?= $MODEL->getQuantity() ?>" type="number" class="form-control" id="quantity" name="quantity" placeholder="Apellidos">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">
              <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
              <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar artículo</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>