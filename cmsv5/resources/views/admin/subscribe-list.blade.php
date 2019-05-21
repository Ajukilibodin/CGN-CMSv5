@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Mail Abonelik Listesi</li>
</ol>
<h1 class="page-header">Mail Abonelik Listesi <small>Yeni haberlerinize abone olan tüm mail adresleri...</small></h1>
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
<!-- begin row -->
<div class="row">
	<!-- begin col-12 -->
	<div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">Mail Listesi</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="data-table" class="table table-striped table-bordered">
						<thead>
							<tr>
                <th>id</th>
								<th>Mail</th>
								<th>Abonelik Tarihi</th>
							</tr>
						</thead>
						<tbody>
              @foreach($pagevalues as $subscribe)
					       <tr>
                  <td>{{$subscribe->id}}</td>
  								<td>{{$subscribe->Mail}}</td>
  								<td>{{$subscribe->created_at}}</td>
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
