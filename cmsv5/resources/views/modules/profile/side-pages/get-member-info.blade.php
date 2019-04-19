<div class="col-md-12">
  @if($message = Session::get('success'))
  <div class="alert alert-success">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @include('libraries.errorpopper')
  <form id="" name="member-info-form" class="nobottommargin" action="{{url('/profile/update')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if($currentcustomer = \App\Customer::where('id',\Cookie::get('customerlogin'))->first() )
    <div class="col_half">
      <label for="userinfo-form-name">Adınız:</label>
      <input type="text" id="userinfo-form-name" name="userinfo-form-name" value="{{$currentcustomer->Name}}" class="sm-form-control" />
    </div>

    <div class="col_half col_last">
      <label for="userinfo-form-lname">Soyadınız:</label>
      <input type="text" id="userinfo-form-lname" name="userinfo-form-lname" value="{{$currentcustomer->Surname}}" class="sm-form-control" />
    </div>

    <div class="col_half">
      <label for="userinfo-form-email">Email adresiniz:</label>
      <input type="email" id="userinfo-form-email" name="userinfo-form-email" value="{{$currentcustomer->Email}}" class="sm-form-control" />
    </div>

    <div class="col_half col_last">
      <label for="userinfo-form-phone">Telefon:</label>
      <input type="text" id="userinfo-form-phone" name="userinfo-form-phone" value="{{$currentcustomer->Phone}}" class="sm-form-control" />
    </div>

<div class="col_two_third">
    <label class="checkbox">
      <input type="checkbox" name="mail-subscribe" value="mail-subscribe"
      @if($currentcustomer->MailSub)
      <?php echo 'checked'; ?>
      @endif
      > Kampanyalar ile ilgili eposta mesajları almak istiyorum.
    </label>
        </div>
  <div class="col_one_third col_last">
    <button type="submit" class="button button-3d fright">BİLGİLERİ GÜNCELLE</button>
    </div>

  @endif
  </form>

</div>
