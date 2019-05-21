@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Sosyal Medya Yönetimi</li>
</ol>
<h1 class="page-header">Sosyal Medya Yönetimi <small>Size ait tüm sosyal medya hesaplarını ekleyin...</small></h1>
@endsection
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
{!! Form::open(['url' => 'ajan/socialaccounts']) !!}
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="social-type">Sosyal Medya Türü:</label>
      <select class="form-control" id="social-type" name="social-type">
        <option value="1">Facebook</option>
        <option value="2">Instagram</option>
        <option value="3">Twitter</option>
        <option value="4">YouTube</option>
        <option value="5">Pinterest</option>
        <option value="6">LinkedIN</option>
        <option value="7">Blogger</option>
        <option value="8">FourSquare</option>
        <option value="9">Tumblr</option>
        <option value="10">SoundCloud</option>
        <option value="11">Wikipedia</option>
      </select>
    </div>
    <div class="col-md-7">
      <label for="social-link">Sosyal Medya Linki:</label>
      <input type="text" class="form-control" id="social-link" name="social-link" value="">
    </div>
    <div class="col-md-1">
      <br><button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i></button>
    </div>
  </div>
</div>
{!! Form::close() !!}
<!-- begin row -->
<div class="row">
	<!-- begin col-12 -->
	<div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">Sosyal Medya Hesaplarım</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="data-table" class="table table-striped table-bordered">
						<thead>
							<tr>
                <th>id</th>
								<th>Tür</th>
								<th>Link</th>
								<th style="width: 70px;">İşlem</th>
							</tr>
						</thead>
						<tbody>
              @foreach($sociallist as $social)
					       <tr>
                  <td>{{$social->id}}</td>
  								<td>{{$social->Type}}</td>
  								<td>{{$social->Link}}</td>
  								<td><a href="{{url('/ajan/delsocial/'.$social->id)}}" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
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
