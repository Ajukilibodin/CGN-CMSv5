@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Ürünlerim</li>
</ol>
<h1 class="page-header">Ürünlerim <small></small></h1>
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
              <h4 class="modal-title" id="myModalLabel">Ürün Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir Ürün silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Ürün silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
  <a title="Geri" class="btn btn-light text-black m-1" data-toggle="tooltip" href="/ajan/categories">
    <i class="fas fa-angle-left"></i> Geri</a>
  <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addproduct">
    <i class="fas fa-plus"></i> Yeni Ürün Ekle</a>
</div>

<!-- begin row -->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Ürünlerim</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Başlık</th>
            <th scope="col">Diğer Kategoriler</th>
            <th scope="col">Fiyat</th>
            <th scope="col" style="width: 110px;">İşlem</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagevalues as $pagevalue)
          @if( strpos('..'.$pagevalue->Categories, strval($c_id))  )
          <tr>
            <th scope="row">{{ $pagevalue->id }}</th>
            <td>{{ $pagevalue->Title }}</td>
            <td>
              @php($catetext = "")
              @foreach( explode(',', $pagevalue->Categories) as $prodcates )
                @foreach( \App\Category::where('id',$prodcates)->where('id','<>', $c_id)->get() as $tempcate )
                  @if($catetext=="")
                    @php($catetext .= $tempcate->Title)
                  @else
                    @php($catetext .= ", ".$tempcate->Title)
                  @endif
                @endforeach
              @endforeach
              {{$catetext}}
            </td>
            <td>
            {{ $pagevalue->Price }}
            {{ \App\Exchange::where('id',$pagevalue->PriceExchange)->first()->Title }}
            </td>
            <td>
              <a href="{{url('/ajan/modproduct/'.$pagevalue->id)}}" title="Ürün Düzenle" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i></a>
              <a href="{{url('/ajan/productalbum/'.$pagevalue->id)}}" title="Ürün Görselleri" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-images"></i></a>
              <a href="{{url('/ajan/editstock/'.$pagevalue->id)}}" title="Stok Modülü" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-store"></i></a>
              <span data-href="{{url('/ajan/delproduct/'.$c_id.'/'.$pagevalue->id)}}" data-toggle="modal" data-target="#confirm-delete">
                <a class="text-danger" title="Ürün Sil" href="javascript:;" data-toggle="tooltip">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </span>
            </td>
          </tr>
          @endif
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
