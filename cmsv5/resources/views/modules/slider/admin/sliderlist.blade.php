@extends('masters.admin')

@section('contenttitle')
<h1>Slider</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Slider</li>
  </ol>
</nav>
<section class="content">
  <div class="row">
    <div class="col-12">
      <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addmenu">
        <i class="fas fa-plus"></i> Yeni Slider Ekle</a>
      <div class="float-right">
        {{ $sliders->links() }}
      </div>
    </div>
    @foreach ($sliders as $slider)
    <div class="col-4 m-2">
      <img src="/img/modules/slider/{{$slider->FilePath}}" style="width: inherit;">
      <div class="m-2"></div>
      <h6>Title: {{$slider->Title}}</h6>
      <div class="m-2"></div>
      <h6>BigTitle: {{$slider->BigTitle}}</h6>
      <div class="m-2"></div>
      <h6>SubText: {{$slider->SubText}}</h6>
      <div class="m-2"></div>
      <h6>ButtonText: {{$slider->ButtonText}}</h6>
      <div class="m-2"></div>
      <h6>TextAlign: {{$slider->TextAlign}}</h6>
    </div>
    @endforeach
  </div>
</section>
@endsection
