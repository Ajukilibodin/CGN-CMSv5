@extends('masters.admin')

@section('contenttitle')
<h1>Alt Kategoriler</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/categories">Kategori Yönetimi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alt Kategoriler</li>
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
              <h4 class="modal-title" id="myModalLabel">Kategori Silme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir kategori silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Kategoriyi ve beraberinde bu kategorilerdeki tüm ürünleri silmek istediğinize emin misiniz?</p>
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
      <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addcategory/{{$c_id}}">
        <i class="fas fa-plus"></i> Yeni Kategori Ekle</a>
      <div class="float-right">
        {{ $pagevalues->links() }}
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Başlık</th>
            <th scope="col">Ürün Sayısı</th>
            <th scope="col" style="width: 70px;">İşlem</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagevalues as $pagevalue)
          <tr>
            <th scope="row">{{ $pagevalue->id }}</th>
            <td>{{ $pagevalue->Title }}</td>

            <td>{{ \App\Category::where('ParentCategory', $pagevalue->id )->count() }} </td>
            <td>
              <a href="/ajan/editcategory/{{$pagevalue->id}}" title="Kategori Düzenle" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i></a>
              <span data-href="/ajan/delcategory/{{$pagevalue->ParentCategory}}/{{$pagevalue->id}}" data-toggle="modal" data-target="#confirm-delete">
                <a class="text-danger" title="Kategori Sil" href="javascript:;" data-toggle="tooltip">
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
