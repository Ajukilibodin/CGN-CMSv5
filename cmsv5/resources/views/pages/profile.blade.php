@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">

@include('modules.profile.profile-side-nav')
@include('modules.profile.profile-page-with-side-nav')

</div>
</div>
</section>
@endsection
