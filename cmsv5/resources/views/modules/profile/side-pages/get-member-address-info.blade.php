
<div class="tabs tabs-alt tabs-tb clearfix" id="tab-8">

  <ul class="tab-nav clearfix">
    <li><a href="#tabs-1">KARGO ADRESİ</a></li>
    <li><a href="#tabs-2">FATURA ADRESİ</a></li>
  </ul>

  <div class="tab-container">


    <div class="tab-content clearfix" id="tabs-1">
      <div class="col-md-12">

        <form id="billing-form" name="billing-form" class="nobottommargin" action="{{url('/profile/updateaddress')}}" method="post">
          @csrf
          @if($currentcustomer = \App\Customer::where('id',\Cookie::get('customerlogin'))->first() )
          <div class="col_half">
            <label for="billing-form-name">Adınız:</label>
            <input type="text" id="billing-form-name" name="billing-form-name" value="{{$currentcustomer->Name}}" class="sm-form-control" disabled/>
          </div>

          <div class="col_half col_last">
            <label for="billing-form-lname">Soyadınız:</label>
            <input type="text" id="billing-form-lname" name="billing-form-lname" value="{{$currentcustomer->Surname}}" class="sm-form-control" disabled/>
          </div>

          <div class="clear"></div>
          @php( $addr = explode('<br>',$currentcustomer->Address) )
          <div class="col_full">
            <label for="billing-form-address">Adres:</label>
            <input type="text" id="billing-form-address" name="billing-form-address" value="{{$addr[0]}}" class="sm-form-control" />
          </div>
          @php( $addr2 = "")
          @if(count($addr)>1)
          @php($addr2 = $addr[1])
          @endif
          <div class="col_full">
            <input type="text" id="billing-form-address2" name="billing-form-address2" value="{{$addr2}}" class="sm-form-control" />
          </div>

          <div class="col_full">
            <label for="billing-form-city">İliniz</label>
            <input type="text" id="billing-form-city" name="billing-form-city" value="{{$currentcustomer->State}}" class="sm-form-control" />
          </div>



          <div class="col_full">
              <button type="submit" class="button button-3d fright">BİLGİLERİ GÜNCELLE</button>
          </div>
        @endif
        </form>
      </div>

    </div>
    <div class="tab-content clearfix" id="tabs-2">

      <div class="col-md-12">
<h3 class="">
<label class="checkbox">
<input disabled  type="checkbox" value="remember-me"> Fatura adresim başka
</label></h3>
<?php // TODO: fatura adresi girebilme ?>

        <form id="shipping-form" name="shipping-form" class="nobottommargin" action="#" method="post">

          <div class="col_half">
            <label for="shipping-form-name">Adınız:</label>
            <input disabled  type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
          </div>

          <div class="col_half col_last">
            <label for="shipping-form-lname">Soyadınız:</label>
            <input disabled  type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="shipping-form-companyname">Ünvanınız:</label>
            <input disabled  type="text" id="shipping-form-companyname" name="shipping-form-companyname" value="" class="sm-form-control" />
          </div>

          <div class="col_half">
            <label for="shipping-form-name">Vergi Numaranız:</label>
            <input disabled  type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
          </div>

          <div class="col_half col_last">
            <label for="shipping-form-lname">Vergi Dairesi:</label>
            <input disabled  type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <label for="shipping-form-address">Adresiniz:</label>
            <input disabled  type="text" id="shipping-form-address" name="shipping-form-address" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <input disabled  type="text" id="shipping-form-address2" name="shipping-form-adress" value="" class="sm-form-control" />
          </div>

          <div class="col_full">
            <label for="shipping-form-city">İliniz</label>
            <input disabled  type="text" id="shipping-form-city" name="shipping-form-city" value="" class="sm-form-control" />
          </div>


            <div class="col_full">
          <a href="#" class="button button-3d fright">BİLGİLERİ GÜNCELLE</a>
            </div>

        </form>
      </div>

    </div>


  </div>

</div>

<div class="line"></div>
