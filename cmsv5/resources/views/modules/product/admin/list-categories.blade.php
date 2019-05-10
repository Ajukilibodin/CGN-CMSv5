@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Kategori Yönetimi</li>
</ol>
<h1 class="page-header">Kategori Yönetimi <small></small></h1>
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
              <h4 class="modal-title" id="myModalLabel">Kategori Başlığı Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir kategori başlığı silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Başlığı ve tüm alt kategorilerini, beraberinde bu kategorilerdeki tüm ürünleri silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
  <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addcategory/0">
    <i class="fas fa-plus"></i> Yeni Kategori Başlığı Ekle</a>
</div>

<!-- begin row -->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Kategoriler</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th>Başlık</th>
                <th>Alt Kategori Sayısı</th>
                <th style="width: 110px;">İşlem</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pagevalues as $pagevalue)
              <tr>
                <th scope="row">{{ $pagevalue->id }}</th>
                <td>{{ $pagevalue->Title }}</td>

                <td>{{ \App\Category::where('ParentCategory', $pagevalue->id )->count() }} </td>
                <td>
                  <a href="/ajan/categories/{{$pagevalue->id}}" title="Alt Kategorileri İncele" class="text-primary" data-toggle="tooltip">
                    <i class="fas fa-swatchbook"></i></a>
                  <a href="/ajan/editcategory/{{$pagevalue->id}}" title="Kategori Düzenle" class="text-primary" data-toggle="tooltip">
                    <i class="fas fa-pencil-alt"></i></a>
                  <span data-href="/ajan/delcategory/{{$pagevalue->id}}" data-toggle="modal" data-target="#confirm-delete">
                    <a class="text-danger" title="Kategori Başlığı Sil" href="javascript:;" data-toggle="tooltip">
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
