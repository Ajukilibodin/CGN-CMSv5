@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Siparişler</li>
</ol>
<h1 class="page-header">Siparişler <small>Üyelerinizin vermiş olduğu siparişler...</small></h1>
@endsection
@section('content')
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
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Sipariş İptali</h4>
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

<!-- begin row -->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Data Table - Default</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th>Satın Alma</th>
                <th>Tip</th>
                <th>Durum</th>
                <th>Müşteri</th>
                <th style="width: 70px;">İşlem</th>
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
    </div>
    <!-- end panel -->
  </div>
  <!-- end col-12 -->
</div>
<!-- end row -->
@endsection
