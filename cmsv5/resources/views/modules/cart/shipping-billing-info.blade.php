<h4>TESLİMAT BİLGİLERİ</h4>

<div class="tabs tabs-alt tabs-tb clearfix" id="tab-8">

  <ul class="tab-nav clearfix">
    <li><a href="#tabs-1">KARGO ADRESİ</a></li>
    <li><a href="#tabs-2">FATURA ADRESİ</a></li>
  </ul>

  <div class="tab-container">


    <div class="tab-content clearfix" id="tabs-1">
      <div class="col-md-12">
        @php($userlogin = false)
        @if($currentcustomer = \App\Customer::where('id',\Cookie::get('customerlogin'))->first() )
        @php($userlogin = true)
        @endif
        <div id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">

          <div class="col_half">
            <label for="billing-form-name">Adınız:</label>
            @if($userlogin)
            <input type="text" id="billing-form-name" name="billing-form-name" value="{{$currentcustomer->Name}}" class="sm-form-control" />
            @else
            <input type="text" id="billing-form-name" name="billing-form-name" value="" class="sm-form-control" />
            @endif
          </div>

          <div class="col_half col_last">
            <label for="billing-form-lname">Soyadınız:</label>
            @if($userlogin)
            <input type="text" id="billing-form-lname" name="billing-form-lname" value="{{$currentcustomer->Surname}}" class="sm-form-control" />
            @else
            <input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
            @endif
          </div>

          <div class="clear"></div>

          @if($userlogin && $currentcustomer->Address != null)
          @php( $addr = explode('<br>',$currentcustomer->Address) )
          @php( $addr2 = "")
          @if(count($addr)>1)
          @php($addr2 = $addr[1])
          @endif
          <div class="col_full">
            <label for="billing-form-address">Adres:</label>
            <input type="text" id="billing-form-address" name="billing-form-address" value="{{$addr[0]}}" class="sm-form-control" />
          </div>

          <div class="col_full">
            <input type="text" id="billing-form-address2" name="billing-form-address2" value="{{$addr2}}" class="sm-form-control" />
          </div>
          @else
          <div class="col_full">
            <label for="billing-form-address">Adres:</label>
            <input type="text" id="billing-form-address" name="billing-form-address" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <input type="text" id="billing-form-address2" name="billing-form-address2" value="" class="sm-form-control" />
          </div>
          @endif

          <div class="col_full">
            <label for="billing-form-city">İliniz</label>
            @if($userlogin &&  $currentcustomer->State != null)
            <input type="text" id="billing-form-city" name="billing-form-city" value="{{$currentcustomer->State}}" class="sm-form-control" />
            @else
            <input type="text" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
            @endif
          </div>

          <div class="col_half">
            <label for="billing-form-email">Email adresimiz:</label>
            @if($userlogin)
            <input type="email" id="billing-form-email" name="billing-form-email" value="{{$currentcustomer->Email}}" class="sm-form-control" />
            @else
            <input type="email" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
            @endif
          </div>

          <div class="col_half col_last">
            <label for="billing-form-phone">Telefon:</label>
            @if($userlogin && $currentcustomer->Phone!=null)
            <input type="text" id="billing-form-phone" name="billing-form-phone" value="{{$currentcustomer->Phone}}" class="sm-form-control" />
            @else
            <input type="text" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />
            @endif
          </div>
          <div class="col_full">
            <input type="checkbox" name="billing-gift-wrap" id="billing-gift-wrap" value="1">
            <label for="billing-gift-wrap"> Hediye Paketi</label>
            <br>
            <label for="billing-form-message">Notunuz <small>*</small></label>
            <textarea class="sm-form-control" id="billing-form-message" name="billing-form-message" rows="6" cols="30"></textarea>
          </div>
        </div>
      </div>

    </div>
    <div class="tab-content clearfix" id="tabs-2">

      <div class="col-md-12">
<h3 class="">
<label disabled class="checkbox">
<input disabled type="checkbox" value="remember-me"> Faturamı başka bir adrese gönder
</label></h3>


        <div id="shipping-form" name="shipping-form" class="nobottommargin" action="#" method="post">

          <div class="col_half">
            <label for="shipping-form-name">Adınız:</label>
            <input  disabled type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
          </div>

          <div class="col_half col_last">
            <label for="shipping-form-lname">Soyadınız:</label>
            <input  disabled type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="shipping-form-companyname">Ünvanınız:</label>
            <input  disabled type="text" id="shipping-form-companyname" name="shipping-form-companyname" value="" class="sm-form-control" />
          </div>

          <div class="col_half">
            <label for="shipping-form-name">Vergi Numaranız:</label>
            <input  disabled type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
          </div>

          <div class="col_half col_last">
            <label for="shipping-form-lname">Vergi Dairesi:</label>
            <input  disabled type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <label for="shipping-form-address">Adresiniz:</label>
            <input  disabled type="text" id="shipping-form-address" name="shipping-form-address" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <input  disabled type="text" id="shipping-form-address2" name="shipping-form-adress" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <label for="shipping-form-city">İliniz</label>
            <input  disabled type="text" id="shipping-form-city" name="shipping-form-city" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <label for="shipping-form-message">Notunuz <small>*</small></label>
            <textarea disabled  class="sm-form-control" id="shipping-form-message" name="shipping-form-message" rows="6" cols="30"></textarea>
          </div>

        </div>
      </div>

    </div>


  </div>

</div>

<div class="line"></div>
