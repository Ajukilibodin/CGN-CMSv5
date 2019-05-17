@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Site Düzenleyici</li>
</ol>
<h1 class="page-header">Site Düzenleyici <small>Sitenizin ayarlarını burdan düzenleyin...</small></h1>
@endsection
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
{!! Form::open(['url' => 'ajan/sitesettings']) !!}
<div class="row panel panel-inverse">
  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-title', 'Site Başlığı')}}
      {{Form::text('val-title',$sitevalues[1]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-toptext', 'Site Topbar Yazısı')}}
      {{Form::text('val-toptext',$sitevalues[0]->Value,['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      {{Form::label('val-email', 'E-posta')}}
      {{Form::text('val-email',$sitevalues[2]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {{Form::label('val-phone', 'Telefon')}}
      {{Form::text('val-phone',$sitevalues[3]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {{Form::label('val-mobile', 'Mobil Telefon')}}
      {{Form::text('val-mobile',$sitevalues[4]->Value,['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-addr1', 'Adres 1. Satır')}}
      {{Form::text('val-addr1',$sitevalues[5]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-addr2', 'Adres 2. Satır')}}
      {{Form::text('val-addr2',$sitevalues[6]->Value,['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{Form::label('val-smyani', 'Anasayfa Sosyal Medya Yanı Yazısı')}}
      {{Form::text('val-smyani',$sitevalues[7]->Value,['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{Form::label('val-footer', 'Footer Sloganı')}}
      {{Form::text('val-footer',$sitevalues[8]->Value,['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-12">
    <h5>Ödeme Seçenekleri:</h5>
    <div class="col-md-4">
      <div class="form-group">
        <input type="checkbox" name="val-pay1" id="val-pay1" value="1" autocomplete="off"
        @if( ( (int)($sitevalues[13]->Value) %2)>=1 ){{'checked'}}@endif/>
        <div class="btn-group m-2">
          <label for="val-pay1" class="btn btn-primary">
            <span class="fas fa-check"></span>
            <span> </span>
          </label>
          <label for="val-pay1" class="btn btn-light active">
            3D Ödeme (CGN Aktivasyon İle !!!)
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="checkbox" name="val-pay2" id="val-pay2" value="2" autocomplete="off"
        @if( ( (int)($sitevalues[13]->Value) %4)>=2 ){{'checked'}}@endif/>
        <div class="btn-group m-2">
          <label for="val-pay2" class="btn btn-primary">
            <span class="fas fa-check"></span>
            <span> </span>
          </label>
          <label for="val-pay2" class="btn btn-light active">
            Havale İle Ödeme
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="checkbox" name="val-pay3" id="val-pay3" value="4" autocomplete="off"
        @if( ( (int)($sitevalues[13]->Value) %8)>=4 ){{'checked'}}@endif/>
        <div class="btn-group m-2">
          <label for="val-pay3" class="btn btn-primary">
            <span class="fas fa-check"></span>
            <span> </span>
          </label>
          <label for="val-pay3" class="btn btn-light active">
            Kapıda Ödeme
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-bank1', 'Banka Adı')}}
      {{Form::text('val-bank1',$sitevalues[9]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-bank2', 'Şube Kodu')}}
      {{Form::text('val-bank2',$sitevalues[10]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-bank3', 'Hesap Numarası')}}
      {{Form::text('val-bank3',$sitevalues[11]->Value,['class' => 'form-control'])}}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{Form::label('val-bank4', 'IBAN No')}}
      {{Form::text('val-bank4',$sitevalues[12]->Value,['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group float-right">
      {{Form::submit('Hepsini Kaydet', ['class' => 'btn btn-primary'])}}
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
