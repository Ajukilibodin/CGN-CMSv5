@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Slider</li>
</ol>
<h1 class="page-header">Slider <small>Anasayfanızda sıralanan görseller...</small></h1>
@endsection
@section('content')
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Slider Silme</h4>
            </div>

            <div class="modal-body">
                <p>Şu an kayıtlı bir slider'i silmek üzeresiniz.</p>
                <p>Bu işlem geri alınamaz!</p>
                <p>Slider'i silmek istediğinize emin misiniz?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
                <a class="btn btn-danger btn-ok">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
  <a href="/ajan/addslider" title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip">
    <i class="fas fa-plus"></i> Yeni Slider Ekle</a>
</div>

  <div class="row">
    @foreach ($sliders as $slider)
    <div class="col-sm-4 m-2">
      <img src="/uploads/modules/slider/{{$slider->FilePath}}" style="width: 100%;">
      <img src="/uploads/modules/slider/{{$slider->PicPath}}" style=" position: absolute; height: 160px; top: 10px; right: 20px;">
      <div class="m-2"></div>
      <span data-href="/ajan/delslider/{{$slider->id}}" data-toggle="modal" data-target="#confirm-delete">
        <a class="text-danger float-right" title="Slider Sil" href="javascript:;" data-toggle="tooltip">
          <i class="fas fa-trash-alt"></i>
        </a>
      </span>
      <h6>Title: {{$slider->Title}}</h6>
      <div class="m-2"></div>
      <h6>BigTitle: {{$slider->BigTitle}}</h6>
      <div class="m-2"></div>
      <h6>SubText: {{$slider->SubText}}</h6>
      <div class="m-2"></div>
      <h6>ButtonText: {{$slider->ButtonText}}</h6>
      <div class="m-2"></div>
      <h6>ButtonLink: {{$slider->ButtonLink}}</h6>
    </div>
    @endforeach
  </div>
@endsection
