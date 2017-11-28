<div id="sidebar-wrapper" class="harmonic">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a href="#">
        Hola, <?=(Security::GetLoggedUser() != null ? Security::GetLoggedUser()->getName() : 'Invitado')?>!
      </a>
    </li>
    <?php if (Security::UserIsLoggedIn()) { ?>
      <li>
        <a href="?c=home" class="<?=(($PAGE == 'Home') ? 'active' : '')?>">
          <i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp;Dashboard
        </a>
      </li>
      <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
        <li>
          <a href="?c=users" class="<?=(($PAGE == 'Users') ? 'active' : '')?>">
            <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Usuarios
          </a>
        </li>
      <?php } else { ?>
        <li>
          <a href="?c=users&a=Edit&id=<?=(Security::GetLoggedUser())->getId()?>" class="<?=(($PAGE == 'Users') ? 'active' : '')?>">
            <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Mi cuenta
          </a>
        </li>
      <?php } ?>
      <li>
        <a href="?c=articles" class="<?=(($PAGE == 'Articles') ? 'active' : '')?>">
          <i class="fa fa-product-hunt" aria-hidden="true"></i> &nbsp;Artículos
        </a>
      </li>
    <?php } ?>
  </ul>
</div>