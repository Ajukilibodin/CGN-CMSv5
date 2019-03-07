<div class="col_two_third col_last nobottommargin">

@foreach(\App\SitePage::where('Type',2)->where('Value', $p_id)->cursor() as $subpage )
<div id="snav-content{{$subpage->id}}">
{!! $subpage->Content !!}
</div>
@endforeach

</div>
