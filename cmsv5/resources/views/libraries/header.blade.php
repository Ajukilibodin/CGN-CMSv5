<!-- Header			============================================= -->
<header id="header">
	<div id="header-wrap">
  	<div class="container clearfix">
  	<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
  	<div id="logo"><!-- Logo		============================================= -->
    	<a href="{{url('/')}}" class="standard-logo" data-dark-logo="{{url('/images/logo-dark.png')}}"><img src="{{url('/images/logo.png')}}" alt="{{\App\Admin\SiteValues::find(2)->Value}}"></a>
    	<a href="{{url('/')}}" class="retina-logo" data-dark-logo="{{url('/images/logo-dark@2x.png')}}"><img src="{{url('/images/logo@2x.png')}}" alt="{{\App\Admin\SiteValues::find(2)->Value}}"></a>
  	</div>
      @include('libraries.primary-menu')
  	</div>
	</div>
</header><!-- #header end -->
