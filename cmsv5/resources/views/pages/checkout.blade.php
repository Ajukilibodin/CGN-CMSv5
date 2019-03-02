@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">
  <div class="row clearfix">
    <div class="col-md-6">
      @include("modules.cart.shipping-billing-info")
    </div>

    <div class="col-md-6">
      @include("modules.cart.payment")
    </div>
  </div>
</div>
</div>
</section>
@endsection
