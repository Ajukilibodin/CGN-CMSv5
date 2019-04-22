@extends('masters.visitor')

@section('content')
<section id="content">
<div class="content-wrap topmargin bottommargin">
<div class="container clearfix">
  <div class="row clearfix">

    <div class="col-md-3">
        @include('modules.product.products-filter')
    </div>

    <div class="col-md-9">
      @include('modules.product.products-list')
    </div>

  </div>
</div>
</div>
</section>
@endsection
