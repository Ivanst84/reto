<div class="br-logo"><a href="../UsuHome/"><span>[</span>URC<span>]</span></a></div>

<div class="br-sideleft overflow-y-auto">
  <label class="sidebar-label pd-x-15 mg-t-20">Menu</label>
  <div class="br-sideleft-menu">

    <a href="../UsuHome/" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Inicio</span>
      </div>
    </a>

    <?php
      if($_SESSION["idRol"]==1){
        ?>
          <a href="../UsuHome/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Mis Noticias</span>
            </div>
          </a>
          <a href="../adminOferentes/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Oferentes</span>
            </div>
          </a>

          <a href="../adminMntlRutas/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Rutas</span>
            </div>
          </a>

          <a href="../adminMntlRutaOferente/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Asignación rutas </span>
            </div>
          </a>

          <a href="../NuevoTicket/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Solicitudes</span>
            </div>
          </a>
          <a href="../ConsultarTicket/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Lista Solicitudes</span>
            </div>
          </a>
        <?php
      }else{
        ?>
          <a href="../UsuHome/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Noticias</span>
            </div>
          </a>

         
        <?php
      }
    ?>


    <a href="../Perfil/" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-20"></i>
        <span class="menu-item-label">Perfil</span>
      </div>
    </a>
    <a href="../NuevoTicket/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Solicitudes</span>
            </div>
          </a>
          <a href="../ConsultarTicket/" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
              <span class="menu-item-label">Lista Solicitudes</span>
            </div>
          </a>


    <a href="../html/Logout.php" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-power tx-20"></i>
        <span class="menu-item-label">Cerrar Sesion</span>
      </div>
    </a>

  </div>
</div>