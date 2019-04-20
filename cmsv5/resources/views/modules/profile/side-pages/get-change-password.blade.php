<form id="" name="member-password-form" class="nobottommargin" action="{{url('/profile/changepassword')}}" method="post">
  @csrf

  <div class="col_half">
    <label for="password-form-oldpass">Güncel Şifreniz:</label>
    <input type="password" id="password-form-oldpass" name="password-form-oldpass" value="" class="sm-form-control"/>
  </div>

  <div class="clear"></div>

  <div class="col_half">
    <label for="password-form-newpass1">Yeni Şifre:</label>
    <input type="password" id="password-form-newpass1" name="password-form-newpass1" value="" class="sm-form-control"/>
  </div>

  <div class="col_half col_last">
    <label for="password-form-newpass2">Yeni Şifre Tekrar:</label>
    <input type="password" id="password-form-newpass2" name="password-form-newpass2" value="" class="sm-form-control"/>
  </div>

  <div class="clear"></div>

  <div class="col_one_third col_last">
    <button type="submit" class="button button-3d fright">ŞİFREMİ GÜNCELLE</button>
  </div>
</form>
