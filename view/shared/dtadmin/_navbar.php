<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button 
      type="button" 
      class="navbar-toggle collapsed" 
      data-toggle="collapse" 
      data-target="#bs-example-navbar-collapse-1"
      aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <a class="navbar-brand" href="#">TiendaApp</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left">
        <div class="input-group">
          <input type="text" placeholder="Buscar" class="form-control">
          <span class="input-group-btn">
          <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?c=authentication&a=Logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
</nav>