@extends('masters.admin')

@section('contenttitle')
<h1>Siparişler</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Siparişler</li>
  </ol>
</nav>
@if($message = Session::get('successmsg'))
<div class="alert alert-success">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Sipariş İptali</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <p>Kayıtlı bir siparişi silmek ve iptal etmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Sipariş kaydını silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>
<section class="content">
  <div class="row">
    <div class="col-12 table-responsive">
      <div class="float-right">
        {{ $pagevalues->links() }}
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Satın Alma</th>
            <th scope="col">Tip</th>
            <th scope="col">Durum</th>
            <th scope="col">Müşteri</th>
            <th scope="col" style="width: 70px;">İşlem</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagevalues as $pagevalue)
          <tr>
            <th scope="row">SIP0{{ sprintf("%09d", $pagevalue->id) }}</th>
            <td>{{ $pagevalue->created_at }}</td>
            <td>{{ $pagevalue->OrderType }}</td>
            <td>
              @switch($pagevalue->OrderState)
              @case('W_Confirm') {!!'<label class="bg-danger">Sipariş Vermeyi Bekliyor</label>'!!} @break
              @case('W_Pay') {!!'<label class="bg-info">Ödeme Bekliyor</label>'!!} @break
              @case('W_Ship') {!!'<label class="bg-warning">Kargolanacak</label>'!!} @break
              @case('W_Arrive') {!!'<label class="bg-info">Kargoda</label>'!!} @break
              @case('Done') {!!'<label class="bg-success">Teslim Edildi</label>'!!} @break
              @endswitch
            </td>

            @if($pagevalue->Customer->Name == 'Non-Customer')
            <td>{{ '(Üyeliksiz) '.$pagevalue->Customer->Password }}</td>
            @else
            <td>{{ $pagevalue->Customer->Name }} {{ $pagevalue->Customer->Surname }}</td>
            @endif

            <td>
              <a href="{{url('/ajan/orders/'.$pagevalue->id)}}" title="Sipariş Güncelle" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i></a>
              <span data-href="#" data-toggle="modal" data-target="#confirm-delete">
                <a class="text-danger" title="Sipariş Sil" href="javascript:;" data-toggle="tooltip">
                  <i class="fas fa-trash-alt"></i>
                  <?php // TODO: order iptal edebilsin ?>
                </a>
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
