<a id="show-sidebar" class="btn btn-sm btn-dark" href="javascript:;">
<i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
<div class="sidebar-content">
  <div class="sidebar-brand">
    <a href="javascript:;">Admin Panel</a>
    <div id="close-sidebar">
      <i class="fas fa-times"></i>
    </div>
  </div>
  <div class="sidebar-menu">
    <ul>
      <li class="header-menu">
        <span>Genel İçerik</span>
      </li>
      <li>
        <a href="/ajan">
          <i class="fas fa-tachometer-alt"></i>
          <span>Ana Sayfa</span>
        </a>
      </li>
      @if( Request::is('ajan/sitesettings') )
      <li class="sidebar-dropdown active">
      @else
      <li class="sidebar-dropdown"> <!-- class+= active -->
      @endif
        <a href="javascript:;">
          <i class="fas fa-globe"></i>
          <span>Site Bilgileri</span>
        </a>
        @if( Request::is('ajan/sitesettings') )
        <div class="sidebar-submenu" style="display:block;">
        @else
        <div class="sidebar-submenu"> <!-- style+= "display:block;" -->
        @endif
          <ul>
            <li>
              <a href="/ajan/sitesettings">Site Düzenleyici</a>
            </li>
            <li>
              <a href="javascript:;">Referanslarım</a>
            </li>
            <li>
              <a href="javascript:;">Galeri</a>
            </li>
            <li>
              <a href="javascript:;">Menü & Sayfa</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="fas fa-pencil-alt"></i>
          <span>Paylaşım Menüsü</span>
        </a>
        <div class="sidebar-submenu">
          <ul>
            <li>
              <a href="javascript:;">Makale Paylaşımı</a>
            </li>
            <li>
              <a href="javascript:;">Haber Paylaşımı</a>
            </li>
            <li>
              <a href="javascript:;">Blog Paylaşımı</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="header-menu">
        <span>E-Ticaret</span>
      </li>
      @if( Request::is('ajan/customers') )
      <li class="sidebar-dropdown active">
      @else
      <li class="sidebar-dropdown"> <!-- class+= active -->
      @endif
        <a href="javascript:;">
          <i class="fas fa-user"></i>
          <span>Üyelik Yönetimi</span>
        </a>
        @if( Request::is('ajan/customers') )
        <div class="sidebar-submenu" style="display:block;">
        @else
        <div class="sidebar-submenu"> <!-- style+= "display:block;" -->
        @endif
          <ul>
            <li>
              <a href="/ajan/customers">Üye Kayıtları</a>
            </li>
            <li>
              <a href="javascript:;">Üye Siparişleri</a>
            </li>
            <li>
              <a href="javascript:;">Kazanım Raporları</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="fas fa-shopping-cart"></i>
          <span>Ürün Yönetimi</span>
        </a>
        <div class="sidebar-submenu">
          <ul>
            <li>
              <a href="javascript:;">Ürün Kategorileri</a>
            </li>
            <li>
              <a href="javascript:;">Ürün Özellik Paneli</a>
            </li>
            <li>
              <a href="javascript:;">Ürünlerim</a>
            </li>
            <li>
              <a href="javascript:;">Stok Takip Sistemi</a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a href="javascript:;">
          <i class="fas fa-life-ring"></i>
          <span>Müşteri Destek</span>
        </a>
      </li>
      <li class="header-menu">
        <span>Teknik İşlemler</span>
      </li>
      <li>
        <a href="javascript:;">
          <i class="fas fa-mail-bulk"></i>
          <span>E-Bülten Paneli</span>
        </a>
      </li>

    </ul>
<!-- Sidebar Demo
<span class="badge badge-pill badge-primary">Beta</span>
<span class="badge badge-pill badge-warning">New</span>
<span class="badge badge-pill badge-danger">3</span>
<span class="badge badge-pill badge-success">Pro</span>

    <ul>
      <li class="header-menu">
        <span>General</span>
      </li>
      <li class="sidebar-dropdown active">
        <a href="javascript:;">
          <i class="fa fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
        <div class="sidebar-submenu" style="display:block;">
          <ul>
            <li>
              <a href="javascript:;">Dashboard 1
              </a>
            </li>
            <li>
              <a href="javascript:;">Dashboard 2</a>
            </li>
            <li>
              <a href="javascript:;">Dashboard 3</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="fa fa-shopping-cart"></i>
          <span>E-commerce</span>
        </a>
        <div class="sidebar-submenu">
          <ul>
            <li>
              <a href="javascript:;">Products

              </a>
            </li>
            <li>
              <a href="javascript:;">Orders</a>
            </li>
            <li>
              <a href="javascript:;">Credit cart</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="far fa-gem"></i>
          <span>Components</span>
        </a>
        <div class="sidebar-submenu">
          <ul>
            <li>
              <a href="javascript:;">General</a>
            </li>
            <li>
              <a href="javascript:;">Panels</a>
            </li>
            <li>
              <a href="javascript:;">Tables</a>
            </li>
            <li>
              <a href="javascript:;">Icons</a>
            </li>
            <li>
              <a href="javascript:;">Forms</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="fa fa-chart-line"></i>
          <span>Charts</span>
        </a>
        <div class="sidebar-submenu">
          <ul>
            <li>
              <a href="javascript:;">Pie chart</a>
            </li>
            <li>
              <a href="javascript:;">Line chart</a>
            </li>
            <li>
              <a href="javascript:;">Bar chart</a>
            </li>
            <li>
              <a href="javascript:;">Histogram</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="fa fa-globe"></i>
          <span>Maps</span>
        </a>
        <div class="sidebar-submenu">
          <ul>
            <li>
              <a href="javascript:;">Google maps</a>
            </li>
            <li>
              <a href="javascript:;">Open street map</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="header-menu">
        <span>Extra</span>
      </li>
      <li>
        <a href="javascript:;">
          <i class="fa fa-book"></i>
          <span>Documentation</span>
          <span class="badge badge-pill badge-primary">Beta</span>
        </a>
      </li>
      <li>
        <a href="javascript:;">
          <i class="fa fa-calendar"></i>
          <span>Calendar</span>
        </a>
      </li>
      <li>
        <a href="javascript:;">
          <i class="fa fa-folder"></i>
          <span>Examples</span>
        </a>
      </li>
    </ul>
  -->
  </div>
  <!-- sidebar-menu  -->
</div>
<!-- sidebar-content  -->
<div class="sidebar-footer">
  <a href="javascript:;">
    <i class="fa fa-bell"></i>
    <span class="badge badge-pill badge-warning notification">3</span>
  </a>
  <a href="javascript:;">
    <i class="fa fa-envelope"></i>
    <span class="badge badge-pill badge-success notification">7</span>
  </a>
  <a href="javascript:;">
    <i class="fa fa-cog"></i>
    <span class="badge-sonar"></span>
  </a>
  <a href="ajan/logout">
    <i class="fa fa-power-off"></i>
  </a>
</div>
</nav>
<!-- sidebar-wrapper  -->
