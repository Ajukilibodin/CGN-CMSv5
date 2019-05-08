@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Menü & Sayfa</li>
</ol>
<h1 class="page-header">Menü & Sayfa <small>Tüm menü link ve sayfalarınız...</small></h1>
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
              <h4 class="modal-title" id="myModalLabel">Menü Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir menüyü silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Menüyü ve tüm alt elemanlarını silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
  <a href="/ajan/addmenu" title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip">
    <i class="fas fa-plus"></i> Yeni Menü Ekle</a>
</div>

<!-- begin row -->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Menü & Sayfa Listesi</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th>Başlık</th>
                <th>Tür</th>
                <th style="width: 70px;">İşlem</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pagevalues as $pagevalue)
              <tr>
                <th scope="row">{{ $pagevalue->id }}</th>
                <td>{{ $pagevalue->Title }}</td>
                @if($pagevalue->Type == 'DefinedPage')
                <td>Tanımlı Sayfa (
                  @if($pagevalue->Value == 0) {{"Ana Sayfa"}}
                  @elseif($pagevalue->Value == 1) {{"İletişim"}}
                  @elseif($pagevalue->Value == 2) {{"Ürünler"}}
                  @endif
                  )</td>
                <td>
                  <a href="/ajan/modmenu/{{$pagevalue->id}}" title="Tanımlı Sayfa Değiştir" class="text-primary" data-toggle="tooltip">
                    <i class="fas fa-pencil-alt"></i></a>
                  <span data-href="/ajan/delmenu/{{$pagevalue->id}}" data-toggle="modal" data-target="#confirm-delete">
                    <a class="text-danger" title="Menü Sil" href="javascript:;" data-toggle="tooltip">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </span>
                </td>
                @elseif($pagevalue->Type == 'PageHeader')
                <td>Sayfa Başlığı</td>
                <td>
                  <a title="Alt Sayfaları İncele" href="/ajan/menupage/{{ $pagevalue->id }}" class="text-primary" data-toggle="tooltip">
                    <i class="fas fa-swatchbook"></i></a>
                  <span data-href="/ajan/delmenu/{{$pagevalue->id}}" data-toggle="modal" data-target="#confirm-delete">
                    <a class="text-danger" title="Menü Sil" href="javascript:;" data-toggle="tooltip">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </span>
                </td>
                @else
                <td></td>
                <td></td>
                @endif
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
