@extends('masters.admin')

@section('contenttitle')
<h1>Yapım Aşamasında</h1>
@endsection
@section('content')
<section class="content">
  {!! Form::open(['url' => 'ajan/faststock/'.'1']) !!}
  <div class="row">
    <div class="col-4">
      <div class="form-group">
      {{Form::label('fst-barkod', 'Ürün Barkodu')}}
      @if(!$prod)
      {{Form::text('fst-barkod','',['class' => 'form-control', 'placeholder' => 'Kategori Başlığı'])}}
      @else
      <input disabled class="form-control" type="text" name="fst-barkod" value="{{$prod->Barcode}}">
      @endif
      </div>
    </div>
    @if($prod)
    <div class="col-4">
      <h4>Ürün Adı: {{$prod->Title}}</h4>
    </div>
    <div class="col-4">
      {{Form::label('fst-barkod', 'Ürün Stokları')}}
      <?php // TODO: burda kaldım!!!! ?>
    </div>
    @endif
    <div class="col-12">
      <div class="form-group float-right">
        {{Form::submit('İleri >', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-secondary" href="/ajan">Geri</a>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</section>
@endsection
