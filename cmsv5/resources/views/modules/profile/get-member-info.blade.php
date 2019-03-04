<div class="col-md-12">

  <form id="" name="member-info-form" class="nobottommargin" action="#" method="post">
    @if($currentcustomer = \App\Customer::where('id',\Cookie::get('customerlogin'))->first() )
    <div class="col_half">
      <label for="billing-form-name">Adınız:</label>
      <input type="text" id="billing-form-name" name="billing-form-name" value="{{$currentcustomer->Name}}" class="sm-form-control" />
    </div>

    <div class="col_half col_last">
      <label for="billing-form-lname">Soyadınız:</label>
      <input type="text" id="billing-form-lname" name="billing-form-lname" value="{{$currentcustomer->Surname}}" class="sm-form-control" />
    </div>

    <div class="col_half">
      <label for="billing-form-email">Email adresiniz:</label>
      <input type="email" id="billing-form-email" name="billing-form-email" value="{{$currentcustomer->Email}}" class="sm-form-control" />
    </div>

    <div class="col_half col_last">
      <label for="billing-form-phone">Telefon:</label>
      <input type="text" id="billing-form-phone" name="billing-form-phone" value="{{$currentcustomer->Phone}}" class="sm-form-control" />
    </div>

<div class="col_two_third">
    <label class="checkbox">
      <input type="checkbox" value="mail-subscribe"> Kampanyalar ile ilgili eposta mesajları almak istiyorum.
    </label>
        </div>
  <div class="col_one_third col_last">
  <a href="#" class="button button-3d fright">BİLGİLERİ GÜNCELLE</a>
    </div>

  @endif
  </form>

</div>
