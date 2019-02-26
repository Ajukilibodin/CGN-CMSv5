@extends('masters.admin')

@section('contenttitle')
<h1>admin login panel</h1>
@endsection

@section('content')

{!! Form::open(['url' => 'ajan/loginsubmit']) !!}
<div class="form-group">
  {{Form::label('username', 'Kullanıcı Adı')}}
  {{Form::text('username','',['class' => 'form-control','placeholder' => 'Kullanıcı Adı'])}}
</div>
<div class="form-group">
  {{Form::label('password', 'Parola')}}
  {{Form::text('password','',['class' => 'form-control','placeholder' => 'Parola'])}}
</div>
<div>
  {{Form::submit('Giriş', ['class' => 'btn btn-primary'])}}
</div>
{!! Form::close() !!}

@endsection
