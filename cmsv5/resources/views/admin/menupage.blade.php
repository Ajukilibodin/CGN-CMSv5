@extends('masters.admin')

@section('contenttitle')
<h1>Menü & Sayfa</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Menü & Sayfa</li>
  </ol>
</nav>

<section class="content">
  <div class="row">
    <div class="col-12 table-responsive">
      <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip">
        <i class="fas fa-plus"></i> Yeni Menü Ekle</a>
      <div class="float-right">
        {{ $pagevalues->links() }}
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Başlık</th>
            <th scope="col">Tür</th>
            <th scope="col" style="width: 70px;">İşlem</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagevalues as $pagevalue)
          <tr>
            <th scope="row">{{ $pagevalue->id }}</th>
            <td>{{ $pagevalue->Title }}</td>
            @if($pagevalue->Type == 'DefinedPage')
            <td>Tanımlı Sayfa(...)</td>
            <td>
              <a title="Tanımlı Sayfa Değiştir" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-pencil-alt"></i></a>
              <a title="Menü Sil" class="text-danger" data-toggle="tooltip">
                <i class="fas fa-trash-alt"></i></a>
            </td>
            @elseif($pagevalue->Type == 'PageHeader')
            <td>Sayfa Başlığı</td>
            <td>
              <a title="Alt Sayfaları İncele" href="/ajan/menupage/{{ $pagevalue->id }}" class="text-primary" data-toggle="tooltip">
                <i class="fas fa-swatchbook"></i></a>
              <a title="Menü Sil" class="text-danger" data-toggle="tooltip">
                <i class="fas fa-trash-alt"></i></a>
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
</section>
@endsection
