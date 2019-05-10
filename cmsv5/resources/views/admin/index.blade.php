@extends('masters.admin')

@section('contenttitle')

@endsection
@section('content')
<!-- analytıc özet başlangıç : row 1-->
<div class="row">

  <div class="col-md-4 col-sm-4">
    <div class="widget widget-stats bg-blue">
      <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
      <div class="stats-info">
        <h4>Güncel Sipariş Sayısı</h4>
        <p>{{\App\Order::where('OrderState','<>','Done')->where('OrderState','<>','W_Confirm')->count()}}</p>
      </div>
      <div class="stats-link">
        <a href="{{url('/ajan/orders/current')}}">Güncel Siparişler <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-4">
    <div class="widget widget-stats bg-purple">
      <div class="stats-icon"><i class="fa fa-users"></i></div>
      <div class="stats-info">
        <h4>Üye Sayısı</h4>
        <p>{{\App\Customer::where('Name','<>','Non-Customer')->count()}}</p>
      </div>
      <div class="stats-link">
        <a href="{{url('/ajan/customers')}}">Üyeler <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-4">
    <div class="widget widget-stats bg-red">
      <div class="stats-icon"><i class="fa fa-shopping-cart"></i></div>
      <div class="stats-info">
        <h4>Sistemdeki Ürün Sayısı</h4>
        <p>{{\App\Product::count()}}</p>
      </div>
      <div class="stats-link">
        <a href="{{url('/ajan/products')}}">Ürünlerim <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

</div>
<!-- analytıc özet bitiş : row 1-->


<!-- begin row 2-->
<div class="row">

  <!-- analytıc grafik başlangıç -->
  <div class="col-md-12">
    <div class="panel panel-inverse" data-sortable-id="index-1">
      <div class="panel-heading">
        <h4 class="panel-title">Website Analytics (Son 30 Gün)</h4>
      </div>
      <div class="panel-body">
        <div id="interactive-chart" class="height-sm"></div>
      </div>
    </div>
  </div>
  <!-- analytıc grafik başlangıç -->

</div><!-- end row 2-->
@endsection
