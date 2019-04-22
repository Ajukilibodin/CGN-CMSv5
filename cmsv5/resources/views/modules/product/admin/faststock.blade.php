@extends('masters.admin')

@section('contenttitle')
<h1>Yapım Aşamasında</h1>
@endsection
@section('content')
<section class="content">

  <div class="row">
    <div class="col-4">
      {!! Form::open(['url' => 'ajan/faststock/']) !!}
      <div class="form-group">
      {{Form::label('fst-barkod', 'Ürün Barkodu')}}
      @if(!$prod)
      {{Form::text('fst-barkod','',['class' => 'form-control', 'placeholder' => 'Ürün Barkodu'])}}
      @else
      <input class="form-control" type="text" name="fst-barkod" value="{{$prod->Barcode}}">
      @endif
      </div>
      <div class="form-group float-right">
        {{Form::submit('İleri >', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-secondary" href="/ajan/faststock">Geri</a>
      </div>
      {!! Form::close() !!}
    </div>
    @if($prod)
    <div class="col-8">
      <h4>Ürün Adı: {{$prod->Title}}</h4>
      {!! Form::open(['url' => 'ajan/editstock/1/'.$prod->id]) !!}
      <small class="float-right">"-1" değeri bu ürünün bu özellikte çeşidi olmadığı anlamına gelir.</small><br>
      <small class="float-right">"0" değeri bu ürünün stokta tükendiği anlamına gelir.</small>
      <h3>Ürün Stokları</h3>

      <div class="form-group row mt-2">
          @php($stok = json_decode($prod->Stock))
          @php($_scount = 1)
          @foreach($stok as $item)
          <div class="col-2">
            {{Form::label('stok-type-'.$_scount, $item->name,['class'=>'mt-2 float-right'])}}
          </div>
          <div class="col-4">
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
    @endif
  </div>
</section>
@endsection
