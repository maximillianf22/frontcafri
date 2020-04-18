
<div style="height:68px; width:100%;"></div>
<div class="content-slider">
     <section class="jumbotron1 ">

     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
     @if(sizeof($Sliders)>=1)
          <div class="carousel-inner">
               @foreach($Sliders as $iCont_ => $Slider)
                    <div class="carousel-item @if($iCont_==0) active @endif">
                         @if(!empty($Slider->imageSlider))
                         @if (file_exists( public_path().'/content/upload/'.$Slider->imageSlider ))
                             <a href="http://{{$Slider->urlSlider}}" target="new"> <img  src="{{ asset('/content/upload/'.$Slider->imageSlider) }}" alt="Slider"/></a>
                         @else
                         @endif
                         @else
                         @endif 
                    </div>
               @endforeach
               <a class="carousel-control-prev" href="#carousel-example-generic" data-slide="prev">
                    <i class="lni-chevron-left" style="font-size:32px; font-weight:bold"></i>
               </a>
                    <a class="carousel-control-next" href="#carousel-example-generic" data-slide="next">
               <i class="lni-chevron-right"  style="font-size:32px; font-weight:bold"></i>
               </a>
          </div>

     @endif
     <ol class="carousel-indicators">
               @foreach($Sliders as $iCont_ => $Slider)
               <li data-target="#carousel-example-generic" data-slide-to="{{$iCont_}}" class="@if($iCont_==0) active @endif"></li>
               @endforeach
          </ol>
     </div>
     </section>
</div>