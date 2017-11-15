<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Crear artículo</h1>
        <a href="?c=articles">Regresar</a>
      </header>
      <div class="panel-body">
        <form action="?c=articles&a=Create" method="POST" autocomplete="off">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="code">Código</label>
              <input type="text" class="form-control" id="code" name="code" placeholder="Código">
            </div>
            <div class="form-group col-md-4">
              <label for="brand">Marca</label>
              <input type="text" class="form-control" id="brand" name="brand" placeholder="Marca">
            </div>
            <div class="form-group col-md-4">
              <label for="description">Descripción</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Descripción">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">Precio</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Precio">
            </div>
            <div class="form-group col-md-6">
              <label for="quantity">Cantidad</label>
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Cantidad">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Crear artículo</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>