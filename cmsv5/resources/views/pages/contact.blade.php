@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">
  @include('libraries.errorpopper')

  <!-- Contact Form & Map Overlay Section============================================= -->
  <section id="map-overlay">

    <div class="container clearfix">

      <!-- Contact Form Overlay
      ============================================= -->
      <div id="contact-form-overlay" class="clearfix">

        <div class="fancy-title title-dotted-border">
          <h3>Bize Ulaşın</h3>
        </div>

        <div class="contact-widget">

          <div class="contact-form-result"></div>

          <!-- Contact Form
          ============================================= -->
          <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">
            <?php // TODO: iletişim formunu aktif hale getir ?>
            <div class="col_half">
              <label for="template-contactform-name">Adınız <small>*</small></label>
              <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
            </div>

            <div class="col_half col_last">
              <label for="template-contactform-email">Email <small>*</small></label>
              <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
            </div>

            <div class="clear"></div>

            <div class="col_half">
              <label for="template-contactform-phone">Telefon</label>
              <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
            </div>

            <div class="col_half col_last">
              <label for="template-contactform-service">Captcha</label>
              <input type="text" id="template-contactform-service" name="template-contactform-service" value="" class="sm-form-control" />
            </div>

            <div class="clear"></div>

            <div class="col_full">
              <label for="template-contactform-subject">Konu <small>*</small></label>
              <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
            </div>

            <div class="col_full">
              <label for="template-contactform-message">Mesaj <small>*</small></label>
              <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
            </div>

            <div class="col_full hidden">
              <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
            </div>

            <div class="col_full">
              <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Mesaj Gönder</button>
            </div>

          </form>
        </div>


        <div class="line"></div>

        <!-- Contact Info
        ============================================= -->
        <div class="col_one_third nobottommargin">

          <address>
            <strong>Merkez:</strong><br>
            {{\App\Admin\SiteValues::find(6)->Value}}<br>
            {{\App\Admin\SiteValues::find(7)->Value}}<br>
          </address>
          <abbr title="Phone Number"><strong>Tel:</strong></abbr> {{\App\Admin\SiteValues::find(4)->Value}}<br>
          <abbr title="Mobile Phone Number"><strong>Mobil:</strong></abbr> {{\App\Admin\SiteValues::find(5)->Value}}<br>
          <abbr title="Email Address"><strong>Email:</strong></abbr> {{\App\Admin\SiteValues::find(3)->Value}}

        </div><!-- Contact Info End -->


      </div><!-- Contact Form Overlay End -->

    </div>

    <!-- Google Map
    ============================================= -->
    <section id="google-map" class="gmap"></section>


  </section><!-- Contact Form & Map Overlay Section End -->


</div>
</div>
</section>
@endsection
