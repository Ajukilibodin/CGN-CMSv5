@extends('masters.admin')

@section('contenttitle')
  <!-- begin brand -->
  <div class="login-header">
    <div class="brand">
      <span class="logo"></span> Yönetim Paneli Giriş
      <small>lütfen kullanıcı adınızı ve şifrenizi giriniz.</small>
    </div>
    <div class="icon">
      <i class="fa fa-sign-in"></i>
    </div>
  </div>
  <!-- end brand -->
@endsection

@section('content')
<div class="login-content">
  <form action="{{url('/ajan/loginsubmit')}}" method="POST" class="margin-bottom-0">
    @csrf
    <div class="form-group m-b-20">
      <input type="text" name="username" class="form-control input-lg" placeholder="Kullanıcı Adı" />
    </div>
    <div class="form-group m-b-20">
      <input type="password" name="password" class="form-control input-lg" placeholder="Şifre" />
    </div>

    <div class="login-buttons">
      <button type="submit" class="btn btn-success btn-block btn-lg">Sisteme Giriş</button>
    </div>
  </form>
</div>
@endsection
