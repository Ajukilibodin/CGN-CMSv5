<section id="slider" class="slider-parallax revslider-wrap ohidden clearfix">

  <div class="tp-banner-container">
    <div class="tp-banner" >
      <ul>
        @foreach( \App\Slider::all() as $slider)

        <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="10000"  data-saveperformance="off"  data-title="{{$slider->ButtonText}}"
          style="
          background-image: url({{url('/uploads/modules/slider/'.$slider->FilePath)}});
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          ">
          <!-- LAYERS -->

          <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
          data-x="630"
          data-y="78"
          data-customin="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
          data-speed="400"
          data-start="1000"
          data-easing="easeOutQuad"
          data-splitin="none"
          data-splitout="none"
          data-elementdelay="0.01"
          data-endelementdelay="0.1"
          data-endspeed="1000"
          data-endeasing="Power4.easeIn" style=""><img src="{{url('/uploads/modules/slider/'.$slider->PicPath)}}" alt=""></div>

          <!-- LAYER NR. 2 -->
          <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
          data-x="0"
          data-y="110"
          data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
          data-speed="700"
          data-start="1000"
          data-easing="easeOutQuad"
          data-splitin="none"
          data-splitout="none"
          data-elementdelay="0.01"
          data-endelementdelay="0.1"
          data-endspeed="1000"
          data-endeasing="Power4.easeIn" style=" color: #fff;">{{$slider->Title}}</div>

          <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
          data-x="0"
          data-y="140"
          data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
          data-speed="700"
          data-start="1200"
          data-easing="easeOutQuad"
          data-splitin="none"
          data-splitout="none"
          data-elementdelay="0.01"
          data-endelementdelay="0.1"
          data-endspeed="1000"
          data-endeasing="Power4.easeIn" style=" color: #fff; line-height: 1.15;">{{$slider->BigTitle}}</div>

          <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
          data-x="0"
          data-y="240"
          data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
          data-speed="700"
          data-start="1400"
          data-easing="easeOutQuad"
          data-splitin="none"
          data-splitout="none"
          data-elementdelay="0.01"
          data-endelementdelay="0.1"
          data-endspeed="1000"
          data-endeasing="Power4.easeIn" style=" color: #fff; max-width: 550px; white-space: normal;">{{$slider->SubText}}</div>

          <div class="tp-caption customin ltl tp-resizeme"
          data-x="0"
          data-y="340"
          data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
          data-speed="700"
          data-start="1550"
          data-easing="easeOutQuad"
          data-splitin="none"
          data-splitout="none"
          data-elementdelay="0.01"
          data-endelementdelay="0.1"
          data-endspeed="1000"
          data-endeasing="Power4.easeIn" style="color: #fff;">
          @php($buttonlink = 'javascript:;')
          @if($slider->ButtonLink != null)
            @if(strrpos($slider->ButtonLink, '://'))
              @php($buttonlink = $slider->ButtonLink)
            @else
              @php($buttonlink = 'http://'.$slider->ButtonLink)
            @endif
          @endif
          <a href="{{$buttonlink}}" target="_blank"
            class="button button-light button-border button-large button-rounded tright nomargin"><span>{{$slider->ButtonText}}</span> <i class="icon-angle-right"></i></a></div>


        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <!-- END REVOLUTION SLIDER -->

</section>
