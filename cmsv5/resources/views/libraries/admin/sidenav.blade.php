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
      <!-- if(in_array($val, $array)) -->
      @if( Request::is('ajan/sitesettings') or Request::is('ajan/menupage')
       or Request::is('ajan/menupage/*') or Request::is('ajan/addmenu') or Request::is('ajan/addmenu/*')
        or Request::is('ajan/addpage/*') or Request::is('ajan/slidersettings') or Request::is('ajan/addslider') )
      <li class="sidebar-dropdown active">
        <a href="javascript:;">
          <i class="fas fa-globe"></i>
          <span>Site Bilgileri</span>
        </a>
        <div class="sidebar-submenu" style="display:block;">
      @else
      <li class="sidebar-dropdown"> <!-- class+= active -->
        <a href="javascript:;">
          <i class="fas fa-globe"></i>
          <span>Site Bilgileri</span>
        </a>
        <div class="sidebar-submenu"> <!-- style+= "display:block;" -->
      @endif
          <ul>
            <li>
              <a href="/ajan/sitesettings">Site Düzenleyici</a>
            </li>
            <li>
              <a href="/ajan/slidersettings">Slider</a>
            </li>
            <li>
              <a href="javascript:;">Referanslarım</a>
            </li>
            <li>
              <a href="/ajan/menupage">Menü & Sayfa</a>
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
        <a href="javascript:;">
          <i class="fas fa-user"></i>
          <span>Üyelik Yönetimi</span>
        </a>
        <div class="sidebar-submenu" style="display:block;">
      @else
      <li class="sidebar-dropdown"> <!-- class+= active -->
        <a href="javascript:;">
          <i class="fas fa-user"></i>
          <span>Üyelik Yönetimi</span>
        </a>
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
      @if( Request::is('ajan/categories') or Request::is('ajan/categories/*') or Request::is('ajan/addcategory/*') )
      <li class="sidebar-dropdown active">
        <a href="javascript:;">
          <i class="fas fa-shopping-cart"></i>
          <span>Ürün Yönetimi</span>
        </a>
        <div class="sidebar-submenu" style="display:block;">
      @else
      <li class="sidebar-dropdown">
        <a href="javascript:;">
          <i class="fas fa-shopping-cart"></i>
          <span>Ürün Yönetimi</span>
        </a>
        <div class="sidebar-submenu">
      @endif
          <ul>
            <li>
              <a href="{{url('/ajan/categories')}}">Ürün Kategorileri</a>
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
  </div>
  <!-- sidebar-menu  -->
</div>
<!-- sidebar-content  -->
<div class="sidebar-footer">
  <a href="/">
    <i class="fas fa-globe"></i>
    <!-- <span class="badge badge-pill badge-warning notification">3</span> -->
  </a>
  <a href="javascript:;">
    <i class="fa fa-envelope"></i>
    <span class="badge badge-pill badge-success notification">7</span>
  </a>
  <a href="/ajan/sitesettings">
    <i class="fa fa-cog"></i>
    <!--<span class="badge-sonar"></span> -->
  </a>
  <a href="/ajan/logout">
    <i class="fa fa-power-off"></i>
  </a>
</div>
</nav>
<!-- sidebar-wrapper  -->
