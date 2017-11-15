<div id="sidebar-wrapper" class="harmonic">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a href="#">
        John Appleseed
      </a>
    </li>
    <li>
    <a href="?c=Home" class="<?=(($PAGE == 'Home') ? 'active' : '')?>">
      <i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp;Dashboard
    </a>
    </li>
    <li>
      <a href="?c=users" class="<?=(($PAGE == 'Users') ? 'active' : '')?>">
        <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Users
      </a>
    </li>
    <li>
      <a href="?c=articles" class="<?=(($PAGE == 'Articles') ? 'active' : '')?>">
        <i class="fa fa-product-hunt" aria-hidden="true"></i> &nbsp;Articles
      </a>
    </li>
    <li>
      <a href="?c=authentication&a=Logout">
        <i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Log out
      </a>
    </li>
  </ul>
</div>