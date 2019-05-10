@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Ürün Özellik Yönetimi</li>
</ol>
<h1 class="page-header">Ürün Özellik Yönetimi <small> Kategorilere tanımlı ürünlerin alabileceği alt değerler listesi</small></h1>
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
              <h4 class="modal-title" id="myModalLabel">Ürün Özelliği Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir Ürün Özelliği silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Ürün Özelliğini silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
  <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addprodcate/">
    <i class="fas fa-plus"></i> Yeni Ürün Özelliği Ekle</a>
</div>

<!-- begin row -->
<div class="row">
<!-- begin col-12 -->
<div class="col-md-12">
  <!-- begin panel -->
  <div class="panel panel-inverse">
    <div class="panel-heading">
      <h4 class="panel-title">Ürün Özellikleri</h4>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Başlık</th>
            <th scope="col">Ünite Adı</th>
            <th scope="col">Alabildiği Değerler</th>
            <th scope="col" style="width: 70px;">İşlem</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagevalues as $pagevalue)
          <tr>
            <th scope="row">{{ $pagevalue->id }}</th>
            <td>{{ $pagevalue->Title }}</td>
            <td>{{ $pagevalue->UnitName }}</td>
            <td>{{ $pagevalue->UnitList }}</td>
            <td>
              <a href="/ajan/editprodcate/{{$pagevalue->id}}" title="Ürün Özelliği Düzenle" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i></a>
              <span data-href="/ajan/delprodcate/{{$pagevalue->id}}" data-toggle="modal" data-target="#confirm-delete">
                <a class="text-danger" title="Ürün Özelliği Sil" href="javascript:;" data-toggle="tooltip">
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
