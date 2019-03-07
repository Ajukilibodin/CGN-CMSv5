@extends('masters.admin')

@section('contenttitle')
<h1>Site Düzenleyici</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Site Düzenleyici</li>
  </ol>
</nav>

<section class="content">
  <div class="row">
    <div class="col-12 table-responsive">
      <div class="float-right">
        {{ $sitevalues->links() }}
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Değer</th>
            <th scope="col" style="width: 100px;">Kaydet</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sitevalues as $sitevalue)

          <form class="" action="/ajan/sitesettings/update/{{ $sitevalue->id }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <tr>
              <th scope="row">{{ $sitevalue->id }}</th>
              <td><label>{{ $sitevalue->Desc }}</label></td>
              <td><input type="text" name="sitevalue-input" class="form-control" value="{{ $sitevalue->Value }}"></td>
              <td>
                  <button title="Kaydet" class="btn btn-primary" data-toggle="tooltip" type="submit">
                    <i class="fas fa-save"></i>
                  </button>
                  @if($sitevalue->id == Session::get('successid'))
                  <span class="badge badge-pill badge-success notification"><i class="fas fa-check"></i></span>
                  @endif
              </td>
            </tr>
          </form>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
