@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/orders/current">Siparişler</a></li>
  <li class="active">Sipariş Güncelle</li>
</ol>
<h1 class="page-header">Sipariş Güncelle <small></small></h1>
@endsection
@section('content')
  {!! Form::open(['url' => 'ajan/orders/'.$pagevalues->id]) !!}
  <div class="row">
    <div class="col-md-4">
      <h4>Sipariş Durumu</h4>
        <div class="form-group">

          <input type="radio" name="order-state" id="radio1" value="1" autocomplete="off"
          @if( $pagevalues->OrderState == 'W_Confirm'  )
          {{'checked'}}
          @endif
          />
          <div class="btn-group m-2">
              <label for="radio1" class="btn btn-primary">
                  <span class="fas fa-check"></span>
                  <span> </span>
              </label>
              <label for="radio1" class="btn btn-light active">Sipariş Vermeyi Bekliyor</label>
          </div>
          <br>
          <input type="radio" name="order-state" id="radio2" value="2" autocomplete="off"
          @if( $pagevalues->OrderState == 'W_Pay'  )
          {{'checked'}}
          @endif
          />
          <div class="btn-group m-2">
              <label for="radio2" class="btn btn-primary">
                  <span class="fas fa-check"></span>
                  <span> </span>
              </label>
              <label for="radio2" class="btn btn-light active">Ödeme Bekliyor</label>
          </div>
          <br>
          <input type="radio" name="order-state" id="radio3" value="3" autocomplete="off"
          @if( $pagevalues->OrderState == 'W_Ship'  )
          {{'checked'}}
          @endif
          />
          <div class="btn-group m-2">
              <label for="radio3" class="btn btn-primary">
                  <span class="fas fa-check"></span>
                  <span> </span>
              </label>
              <label for="radio3" class="btn btn-light active">Kargolanacak</label>
          </div>
          <br>
          <input type="radio" name="order-state" id="radio4" value="4" autocomplete="off"
          @if( $pagevalues->OrderState == 'W_Arrive'  )
          {{'checked'}}
          @endif
          />
          <div class="btn-group m-2">
              <label for="radio4" class="btn btn-primary">
                  <span class="fas fa-check"></span>
                  <span> </span>
              </label>
              <label for="radio4" class="btn btn-light active">Kargoda</label>
          </div>
          <br>
          <input type="radio" name="order-state" id="radio5" value="5" autocomplete="off"
          @if( $pagevalues->OrderState == 'Done'  )
          {{'checked'}}
          @endif
          />
          <div class="btn-group m-2">
              <label for="radio5" class="btn btn-primary">
                  <span class="fas fa-check"></span>
                  <span> </span>
              </label>
              <label for="radio5" class="btn btn-light active">Teslim Edildi</label>
          </div>
        </div>
    </div>
    <div class="col-md-8">
      <h4>Sipariş Bilgileri</h4>
      <h5><strong>Sipariş Kodu: </strong>SIP-{{sprintf("%09d", $pagevalues->id)}}</h5>

      @if($pagevalues->Customer->Name == 'Non-Customer')
      <h5><strong>Müşteri Adı: </strong>{{ '(Üyeliksiz) '.$pagevalues->Customer->Password }}</h5>
      @else
      <h5><strong>Müşteri Adı: </strong>{{ $pagevalues->Customer->Name }} {{ $pagevalues->Customer->Surname }}</h5>
      @endif

      <h5><strong>Adres: </strong><br>{!!$pagevalues->Address!!}</h5>
      <h5><strong>İl: </strong>{{$pagevalues->State}}</h5>
      <h5><strong>Sepet Toplam: </strong>{{$pagevalues->CartTotal.$pagevalues->Exchange->Title}}</h5>
      <h5><strong>Kargo Şirketi: </strong>{{Form::text('order-cargoname',$pagevalues->CargoName,['class' => 'form-control'])}}</h5>
      <h5><strong>Kargo Takip Kodu: </strong>{{Form::text('order-cargofollow',$pagevalues->CargoFollow,['class' => 'form-control'])}}</h5>
    </div>
    <div class="col-md-12 table-responsive">
      <h4>Sepet İçeriği</h4>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Ürün ID</th>
            <th scope="col">Ürün Adı</th>
            <th scope="col">Türü</th>
            <th scope="col">Tekil Fiyat</th>
            <th scope="col">Toplam Fiyat</th>
            <th scope="col">Adedi</th>
            <th scope="col">Stok</th>
          </tr>
        </thead>
        <tbody>
          @foreach (json_decode($pagevalues->Cart) as $cart_item)
          @php ($c_prod = \App\Product::where('id',$cart_item->p_id)->get()->first())
          <tr>
            <th scope="row">{{ $cart_item->p_id }}</th>
            <td>{{ $c_prod->Title }}</td>
            <td>{{ $cart_item->type }}</td>
            <td>{{ $c_prod->Price - ($c_prod->Price/100*$c_prod->Discount) }}</td>
            <td>{{ ($c_prod->Price - ($c_prod->Price/100*$c_prod->Discount)) * $cart_item->count }}</td>
            <td>{{ $cart_item->count }}</td>
            @php ($stock_count = 0)
            @foreach( json_decode($c_prod->Stock) as $stok_item )
            @if($stok_item->name == $cart_item->type)
            @php($stock_count = $stok_item->val)
            @endif
            @endforeach
            <th scope="row">{{ $stock_count }}
              <a href="{{url('/ajan/editstock/'.$cart_item->p_id)}}" title="Stok Modülü" class="text-primary" data-toggle="tooltip">
              <i class="fas fa-store"></i></a></th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-12">
      <div class="form-group float-right">
        {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
        <a class="btn btn-secondary" href="{{url('/ajan/orders/current')}}">Geri</a>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
