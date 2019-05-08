@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Üye Kayıtları</li>
</ol>
<h1 class="page-header">Üye Kayıtları <small>Sisteminize üye olan kullanıcılar...</small></h1>
@endsection
@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Kullanıcı Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir müşteri kullanıcısını silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Kullanıcıyı silmek istediğinize emin misiniz?</p>
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
        <h4 class="panel-title">Kullanıcılar</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th>Ad Soyad</th>
                <th>Son Giriş</th>
                <th style="width: 70px;">İşlem</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)

              <tr>
                <th scope="row">{{ $customer->id }}</th>
                <td>{{ $customer->Name }} {{ $customer->Surname }}</td>
                <td>{{ $customer->LastLogin }}</td>
                <td>
                  <span data-href="/ajan/customers/delete/{{$customer->id}}" data-toggle="modal" data-target="#confirm-delete">
                    <a class="text-danger" title="Kullanıcı Sil" href="javascript:;" data-toggle="tooltip">
                      <i class="fas fa-trash-alt"></i>
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
