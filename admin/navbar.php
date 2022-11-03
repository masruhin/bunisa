 <!-- include ../vendors/includes/mixins-->
 <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
  <?php
        include "koneksi.php";
        $menu = $db->prepare("SELECT id_modulutama, 
                                  nama_modulutama, 
                                  posisi_modulutama, 
                                  icon, 
                                  subheading, 
                                  link, 
                                  path, 
                                  urutan, 
                                  level_user, 
                                  level_admin, 
                                  aktif_modulutama 
                            FROM modulutama
                            WHERE aktif_modulutama ='Y'");
        $menu->execute();
        $ada = $menu->get_result();
        while ($r = $ada->fetch_object()) {
          $submenu = $db->prepare("SELECT id_modulsub, 
                                      id_modulutama, 
                                      nama_modulsub, 
                                      subheading, 
                                      link, 
                                      path, 
                                      level_user, 
                                      level_admin, 
                                      urutan, 
                                      aktif_modulsub 
                                FROM modulsub 
                                WHERE aktif_modulsub='Y' ORDER BY urutan ASC");
          $submenu->execute();
          $adasub = $submenu->get_result();
          if ($adasub->num_rows > 0) {
            echo '<li class="active" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="maps-leaflet.html" data-toggle="dropdown" data-i18n="Leaflet Maps">
                      <i data-feather="' . $r->icon . '"></i>
                      <span data-i18n="Leaflet Maps">' . $r->nama_modulutama . '</span>
                    </a>
                  </li>
                ';
            while ($w = $adasub->fetch_object()) {
              echo '<li data-menu="">
                          <a class="dropdown-item d-flex align-items-center" href="' . $w->link . '" data-toggle="dropdown" data-i18n="Raise Support">
                            <i data-feather="life-buoy"></i>
                            <span data-i18n="Raise Support">' . $w->nama_modulsub . '</span></a>
                        </li>';
            }
          } else {
            echo '<a class="dropdown-item" href="login.php">
              <i class="mr-50" data-feather="power"></i>
              Logout</a>';
          }
        }
        ?>

   
 </ul>