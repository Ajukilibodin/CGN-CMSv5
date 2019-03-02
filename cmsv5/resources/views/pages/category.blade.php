@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">
<div class="clear"></div>
@include('modules.category.category-carousel')
<div class="clear topmargin"></div>
@include('modules.category.category-list')
<div class="clear"></div>
</div>
</div>
</section>
@endsection
