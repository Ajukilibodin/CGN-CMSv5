@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/products">Ürünlerim</a></li>
  <li class="active">Stok Girişi</li>
</ol>
<h1 class="page-header">Stok Girişi <small></small></h1>
@endsection
@section('content')
<div class="row panel panel-inverse">
  <div class="col-md-8">
    {!! Form::open(['url' => 'ajan/editstock/1/'.$product->id]) !!}
    <small class="float-right">"-1" değeri bu ürünün bu özellikte çeşidi olmadığı/üretilmediği anlamına gelir.</small><br>
    <small class="float-right">"0" değeri bu ürünün stokta tükendiği anlamına gelir.</small>
    <h3>Ürün Stokları</h3>

    <div class="form-group row mt-2">
        @php($stok = json_decode($product->Stock))
        @php($_scount = 1)
        @foreach($stok as $item)
        <div class="col-md-2">
          {{Form::label('stok-type-'.$_scount, $item->name,['class'=>'mt-2 float-right'])}}
        </div>
        <div class="col-md-4">
          {{Form::number('stok-type-'.$_scount, $item->val ,['class' => 'form-control m-1', 'min' => '-1'])}}
        </div>
        @php($_scount += 1)
        @endforeach
    </div>

    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="{{url('/ajan/products/')}}">Geri</a>
    </div>
    {!! Form::close() !!}
  </div>

  <div class="col-md-4">
      {!! Form::open(['url' => 'ajan/editstock/2/'.$product->id]) !!}
      <div class="form-group">
      {{Form::label('stok-barkod', 'Ürün Barkodu')}}
      {{Form::text('stok-barkod', $product->Barcode ,['class' => 'form-control', 'placeholder' => 'Ürün Barkodu'])}}
      <small>Ürüne kolay stok girişi için barkod tanımlayabilirsiniz.</small>
      </div>
      <div class="form-group">
      {{Form::label('stok-alarm', 'Stok Alarmı')}}
      {{Form::number('stok-alarm', $product->StockAlarm ,['class' => 'form-control m-1', 'min' => '-1'])}}
      <small>(-1 = Alarm Kapalı)</small>
      </div>
      <div class="form-group float-right">
        {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-secondary" href="{{url('/ajan/products/')}}">Geri</a>
      </div>
      {!! Form::close() !!}
  </div>
</div>
@endsection
