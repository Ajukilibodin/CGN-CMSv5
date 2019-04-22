<!-- Footer		============================================= -->
<footer id="footer" class="dark  ">
  <div class="container">
    <div class="footer-widgets-wrap clearfix notoppadding nobottompadding allmargin-xs">
      <div class="col-md-3">
        <div class="widget widget_links clearfix">
          <ul>
          <li><a href="tel:{{\App\Admin\SiteValues::find(4)->Value}}">{{\App\Admin\SiteValues::find(4)->Value}}</a></li>
          <li><a href="tel:{{\App\Admin\SiteValues::find(5)->Value}}">{{\App\Admin\SiteValues::find(5)->Value}}</a></li>
          <li><a href="mailto:{{\App\Admin\SiteValues::find(3)->Value}}">{{\App\Admin\SiteValues::find(3)->Value}}</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget widget_links clearfix">
          <ul>
          <li><a href="{{url('/page/2')}}">Garanti Şartları</a></li>
          <li><a href="{{url('/page/2')}}">Kullanıcı Sözleşmesi</a></li>
          <li><a href="{{url('/page/2')}}">Gizlilik Bildirimi</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget widget_links clearfix">
          <ul>
          <li><a href="{{url('/page/2')}}">İade ve Değişim</a></li>
          <li><a href="{{url('/page/2')}}">Site Güvenliği</a></li>
          <li><a href="{{url('/page/2')}}">Sıkça Sorulan Sorular</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col_last">
        <div class="widget subscribe-widget clearfix">
        <img src="images/footer-secure.svg" alt="" class="nomargin ">
        </div>
      </div>
    </div>
  </div><!-- .footer-widgets-wrap end -->
  <!-- Copyrights============================================ -->
  <div id="copyrights allmargin-xs">
    <div class="container clearfix">
      <div class="col_half">

      </div>
      <div class="col_half col_last tright">
      Copyrights &copy; 2019 All Rights Reserved by {{\App\Admin\SiteValues::find(2)->Value}}
      </div>
    </div>
  </div><!-- #copyrights end -->
</footer><!-- #footer end -->
