<!-- Top Bar		============================================= -->
<div id="top-bar" class="hidden-xs">
  <div class="container clearfix">
    <div class="col-md-4 fleft nobottommargin">
      <p class="nobottommargin"> {{\App\Admin\SiteValues::find(4)->Value}} | {{\App\Admin\SiteValues::find(3)->Value}}</p>
    </div>
    <div class="col-md-4 nobottommargin">
      <div class="slideInRight animated" alt="" title="" data-animate="slideInRight">
        {{\App\Admin\SiteValues::find(1)->Value}}
      </div>
    </div>
    <div class="col-md-4 col_last fright nobottommargin">
      <div class="top-links">
        <ul>
          <li><a href="#">TRY</a>
            <ul>
              @foreach(\App\Exchange::where('id','<>',1)->get() as $excha)
              <li><a href="#">{{$excha->Title.' ('.$excha->Multipler.')'}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="#">TR</a>
            <ul>
              <li><a href="#"><img src="/images/icons/flags/english.png" alt="English"> EN</a></li>
              <li><a href="#"><img src="/images/icons/flags/french.png" alt="French"> FR</a></li>
              <li><a href="#"><img src="/images/icons/flags/italian.png" alt="Italian"> IT</a></li>
              <li><a href="#"><img src="/images/icons/flags/german.png" alt="German"> DE</a></li>
            </ul>
          </li>
          @if( !\Cookie::get('customerlogin') )
          <li><a href="/login">Yeni Üye</a></li>
          <li><a href="#">Giriş</a>
            <div class="top-link-section">
              <form id="top-login" role="form" method="post" action="/login/login">
                @csrf
                <div class="input-group" id="top-login-username">
                  <span class="input-group-addon"><i class="icon-user"></i></span>
                  <input name="login-form-username" type="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="input-group" id="top-login-password">
                  <span class="input-group-addon"><i class="icon-key"></i></span>
                  <input name="login-form-password" type="password" class="form-control" placeholder="Şifre" required="">
                </div>
                <label class="checkbox">
                  <input type="checkbox" value="remember-me"> Hatırla
                </label>
                <label> Şifremi Unuttum </label>
                <button class="btn btn-danger btn-block" type="submit">Giriş Yap</button>
              </form>
            </div>
          </li>
          @else
          <li>Hoşgeldin {{\Cookie::get('customername')}}</li>
          @endif
        </ul>
      </div>
      @if( \Cookie::get('customerlogin') )
      <div id="top-account" class="dropdown">
        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i><i class="icon-angle-down"></i></a>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
          <li><a href="/profile">Profilim</a></li>
          <li><a href="#">Mesajlarım <span class="badge">5</span></a></li>
          <li><a href="#">Takip Listem</a></li>
          <li><a href="#">Siparişlerim</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="/logout">Çıkış <i class="icon-signout"></i></a></li>
        </ul>
      </div>
      @endif
    </div>
  </div>
</div>

<!-- #top-bar end -->
