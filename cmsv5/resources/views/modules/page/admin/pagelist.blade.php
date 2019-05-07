@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/menupage">Menü & Sayfa</a></li>
  <li class="active">Alt Sayfa Listesi</li>
</ol>
<h1 class="page-header">Alt Sayfa Listesi <small>Sayfa başlığı altındaki sayfalar...</small></h1>
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
              <h4 class="modal-title" id="myModalLabel">Sayfa Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir sayfayı silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Sayfa ve içeriğini silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
  <a href="/ajan/addpage/{{$p_id}}" title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip">
    <i class="fas fa-plus"></i> Yeni Alt Sayfa Ekle</a>
</div>

<!-- begin row -->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Alt Sayfa Listesi</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th>Başlık</th>
                <th>İçerik Özeti</th>
                <th style="width: 70px;">İşlem</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pagevalues as $pagevalue)
              <tr>
                <td>{{ $pagevalue->id }}</td>
                <td>{{ $pagevalue->Title }}</td>
                <td>{!! substr(strip_tags($pagevalue->Content),0,110).'...' !!}</td>
                <td>
                  <a href="/ajan/modpage/{{$pagevalue->id}}" title="Sayfa Düzenle" class="text-primary" data-toggle="tooltip">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <span data-href="/ajan/delpage/{{$p_id}}/{{$pagevalue->id}}" data-toggle="modal" data-target="#confirm-delete">
                    <a class="text-danger" title="Menü Sil" href="javascript:;" data-toggle="tooltip">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </span>
                </td>
              </tr>
              @endforeach
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
