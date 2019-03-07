<div id="side-navigation" class="tabs custom-js">

<div class="col_one_third nobottommargin">

<ul class="sidenav">
@if($firstpage = true)@endif
@foreach(\App\SitePage::where('Type',2)->where('Value', $p_id)->cursor() as $subpage )
@if($firstpage)
<li class="ui-tabs-active"><a href="#snav-content{{$subpage->id}}">{{$subpage->Title}}<i class="icon-chevron-right"></i></a></li>
@if($firstpage = false)@endif
@else
<li><a href="#snav-content{{$subpage->id}}">{{$subpage->Title}}<i class="icon-chevron-right"></i></a></li>
@endif
@endforeach
</ul>

</div>
