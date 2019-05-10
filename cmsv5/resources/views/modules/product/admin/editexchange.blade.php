@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Kur Girişi</li>
</ol>
<h1 class="page-header">Kur Girişi <small></small></h1>
@endsection
@section('content')

  <div class="row panel panel-inverse">
    <div class="col-12 table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Para Değeri</th>
            <th scope="col">En Son Güncelleme</th>
            <th scope="col" style="width: 100px;">Kaydet</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sitevalues as $sitevalue)

          <form class="" action="/ajan/exchanges/{{ $sitevalue->id }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <tr>
              <th scope="row">{{ $sitevalue->id }}</th>
              <td>
                <div class="row">
                  <div class="col-md-2">
                    <label for="sitevalue-input">{{'1 TRY = '}}</label>
                  </div>
                  <div class="col-md-6">
                    <input type="number" step="0.01" min="0.01" name="sitevalue-input" class="form-control" value="{{ $sitevalue->Multipler }}">
                  </div>
                  <div class="col-md-4">
                    <label for="sitevalue-input">{{ $sitevalue->Title }}</label>
                  </div>
                </div>
              </td>
              <td><label>{{ $sitevalue->updated_at }}</label></td>
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
@endsection
