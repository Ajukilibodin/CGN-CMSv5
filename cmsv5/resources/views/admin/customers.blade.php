@extends('masters.admin')

@section('contenttitle')
<h1>Üye Kayıtları</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Üye Kayıtları</li>
  </ol>
</nav>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Kullanıcı Silme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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

<section class="content">
  <div class="row">
    <div class="col-12 table-responsive">
      <div class="float-right">
        {{ $customers->links() }}
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">Son Giriş</th>
            <th scope="col">İşlem</th>
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
</section>
@endsection
