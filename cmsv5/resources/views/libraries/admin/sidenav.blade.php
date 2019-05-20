<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar nav -->
    <ul class="nav">

      <li class="nav-header">YÖNETİM PANELİ</li>

      <li><a href="{{url('/ajan')}}"><i class="fa fa-laptop"></i><span>Panel Giriş</span></a></li>
      <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b><i class="fa fa-envelope"></i><span>E-Mail Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="javascript:;" target="_blank">Mail Kontrol</a></li>
          <li><a href="/ajan/nonpage">Yeni Mail Oluştur</a></li>
          <li><a href="/ajan/nonpage">Mail Abonelik Listesi</a></li>
        </ul>
      </li>
      <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b><i class="fa fa-cog"></i><span>Site Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="/ajan/sitesettings">Site Düzenleyici</a></li>
          <li><a href="/ajan/menupage">Menü & Sayfa</a></li>
          <li><a href="/ajan/slidersettings">Slider</a></li>
          <li><a href="/ajan/nonpage">Referanslarım</a></li>
          <li><a href="/ajan/socialaccounts">Sosyal Medya Yönetimi</a></li>
        </ul>
      </li>
      <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b><i class="fa fa-camera"></i>
          <span>Media Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="/ajan/nonpage"> Resim Galerisi</a></li>
          <li><a href="/ajan/nonpage"> Video Galeri</a></li>
        </ul>
      </li>
      <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b><i class="fa fa-file-o"></i>
          <span>Paylaşım Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="/ajan/nonpage">Makale Paylaşımı</a></li>
          <li><a href="/ajan/nonpage">Haber Paylaşımı</a></li>
          <li><a href="/ajan/nonpage">Blog Paylaşımı</a></li>
        </ul>
      </li>

      <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b><i class="fa fa-user"></i>
          <span>Üye Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="/ajan/nonpage"><span>Yeni Üye Ekleme</span></a></li>
          <li><a href="/ajan/customers"><span>Üyeler </span></a></li>
        </ul>
      </li>

      <li class="has-sub">
        <a href="javascript:;"> <b class="caret pull-right"></b> <i class="fa fa-cart-arrow-down"></i><span>Ürün Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="{{url('/ajan/categories')}}">Ürün Kategorileri</a></li>
          <li><a href="{{url('/ajan/prodcate')}}">Ürün Özellik Paneli</a></li>
          <li><a href="{{url('/ajan/products')}}">Ürünlerim</a></li>
          <li><a href="{{url('/ajan/exchanges')}}">Kur Girişi</a></li>
          <li><a href="{{url('/ajan/faststock')}}">Stok Takip Sistemi</a></li>
        </ul>
      </li>

      <li class="has-sub">
        <a href="javascript:;"> <b class="caret pull-right"></b> <i class="fa fa-ship"></i><span>Sipariş Yönetimi</span></a>
        <ul class="sub-menu">
          <li><a href="{{url('/ajan/orders/current')}}">Güncel Siparişler</a></li>
          <li><a href="{{url('/ajan/orders/done')}}">Tamamlanmış Siparişler</a></li>
          <li><a href="{{url('/ajan/orders')}}">Tüm Siparişler</a></li>
        </ul>
      </li>

      <li><a href="/ajan/nonpage"><i class="fa fa-line-chart"></i><span>Raporlar </span></a>
      </li>
      </li>

      <li><a href="/ajan/nonpage"><i class="fa fa-cog"></i><span>Kullanıcılar </span></a></li>

      <li><a href="/ajan/nonpage"><i class="fa fa-life-ring"></i><span>Yardım </span></a></li>
      <li><a href="/ajan/logout"><i class="fa fa-sign-out"></i><span>Çıkış </span></a></li>


      <!-- begin sidebar minify button -->
      <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
      <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
