<div class="navbar-container main-menu-content" data-menu="menu-container">
  <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <?php
    include "koneksi.php";
    $menu = $db->prepare("SELECT id_modulutama, nama_modulutama,  posisi_modulutama,  icon, subheading,  link, path, urutan, level_user, level_admin, aktif_modulutama FROM modulutama WHERE aktif_modulutama ='Y'");
    $menu->execute();
    $ada = $menu->get_result();
    while ($r = $ada->fetch_object()) {
      $submenu = $db->prepare("SELECT id_modulsub, id_modulutama, nama_modulsub, subheading,  link, path, level_user, level_admin, urutan, aktif_modulsub FROM modulsub  WHERE aktif_modulsub='Y' ORDER BY urutan ASC");
      $submenu->execute();
      $adasub = $submenu->get_result();
      if ($adasub->num_rows > 0) {
        echo '<li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown"   data-i18n="Documentation"><i data-feather="' . $r->icon . '"></i><span data-i18n="Documentation">' . $r->nama_modulutama . '</span></a>
              <ul class="dropdown-menu">';
        while ($w = $adasub->fetch_object()) {
          echo '<li data-menu="">
                  <a href="' . $w->link . '">
                    <i data-feather="folder"></i>
                  <span data-i18n="Documentation">' . $w->nama_modulsub . '</span>
                  </a>
                </li>';
        }
        echo '
              </ul>
            </li>';
      } else {
        echo '<li> <a href="' . $r->link . '"> <i data-feather="' . $r->icon . '"></i>' . $r->nama_modulutama . '</a> </li>';
      }
    }
    ?>
  </ul>
</div>


<li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="box"></i><span data-i18n="Misc">Misc</span></a>
  <ul class="dropdown-menu">
    <li data-menu="">
      <a class="dropdown-item d-flex align-items-center" data-toggle="dropdown" data-i18n="Documentation" target="_blank">
        <i data-feather="folder"></i>
        <span data-i18n="Documentation">Documentation</span>
      </a>
    </li>
  </ul>
</li>