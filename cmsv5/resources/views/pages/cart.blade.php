@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">

@include('modules.cart.get-cart')
@include('modules.cart.cart-total')

</div>
</div>
</section>
@endsection
