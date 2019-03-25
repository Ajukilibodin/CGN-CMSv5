<!-- Page Title		============================================= -->
<section id="page-title" class="page-title-mini">
  <div class="container clearfix">
    @if(Request::is('login'))
    <h1>YENİ ÜYELİK</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li class="active">Yeni Üyelik</li>
    </ol>
    @elseif(Request::is('profile'))
    <h1>PROFİLİM</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li class="active">Profilim</li>
    </ol>
    @elseif(Request::is('page/*'))
    @php($pagetitle = \App\SitePage::where('id',$p_id)->first()->Title)
    <h1>{{$pagetitle}}</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li class="active">{{$pagetitle}}</li>
    </ol>
    @elseif(Request::is('category'))
    <h1>Katalog</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li class="active">Katalog</li>
    </ol>
    @elseif(Request::is('products/*'))
    @php($title = $catevalues->Title)
    <h1>{{$title}}</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li><a href="/category">Katalog</a></li>
      <li class="active">{{$title}}</li>
    </ol>
    @elseif(Request::is('product/*'))
    @php($title = $pagevalues->Title)
    <h1>{{$title}}</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li><a href="/category">Katalog</a></li>
      <li class="active">{{$title}}</li>
    </ol>
    @elseif(Request::is('cart'))
    <h1>Sepet</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li class="active">Sepet</li>
    </ol>
    @elseif(Request::is('checkout'))
    <h1>Ödeme</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li>Sepet</li>
      <li class="active">Ödeme</li>
    </ol>
    @else
    <h1>*ENTER-TITLE*</h1>
    <ol class="breadcrumb">
      <li><a href="/">Anasayfa</a></li>
      <li class="active">*PAGE-TITLE*</li>
    </ol>
    @endif
  </div>
</section><!-- #page-title end -->
