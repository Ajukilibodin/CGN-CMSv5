@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">

@include('modules.product.get-product')
@include('modules.product.related-products-carousel')

</div>
</div>
</section>
@endsection
