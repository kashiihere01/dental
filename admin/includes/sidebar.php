<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Dental</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Pages</li>
            <?php if ($_SESSION['user_role'] === "admin" || $_SESSION['user_role'] === "employee") {
            echo '
            <li class="dropdown">
            <a href="doctors.php" class="nav-link"><i class="fas fa-users"></i><span>Doctors</span></a>
          </li>
          <li class="dropdown">
          <a href="slots.php" class="nav-link"><i class="
          fas fa-stopwatch"></i><span>slots</span></a>
        </li>
        <li class="dropdown">
        <a href="prices.php" class="nav-link"><i class="fas fa-dollar-sign"></i><span>Prices</span></a>
      </li>
            ';
          } ?>
               <?php if ($_SESSION['user_role'] === "admin") {
            echo '
            <li class="dropdown">
            <a href="view-users.php" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
          </li>
       
            ';
          } ?>
 <li class="dropdown">
              <a href="appointments.php" class="nav-link"><i class="fas  fa-calendar-check"></i><span>Apointments</span></a>
            </li>
            <li class="dropdown">
              <a href="our-services.php" class="nav-link"><i class="fas fa-layer-group"></i><span>Our Services</span></a>
            </li>
            
            <li class="dropdown">
              <a href="inbox.php" class="nav-link"><i class="fas fa-comment-alt"></i><span>Messages</span></a>
            </li>
          </ul>
        </aside>
      </div>