<ul class="navbar-nav">
  <li>
    <div class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo SESSION::get('username');?>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?php echo URLROOT ?>pages/profile">Profile</a>
        <a class="dropdown-item" href="<?php echo URLROOT ?>pages/logout">Logout</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a href="<?php echo URLROOT ?>pages/profile" class="nav-link"><i class="far fa-user"></i></a>
  </li>
</ul>
