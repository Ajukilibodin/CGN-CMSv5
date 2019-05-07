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
<div class="row">
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
    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
