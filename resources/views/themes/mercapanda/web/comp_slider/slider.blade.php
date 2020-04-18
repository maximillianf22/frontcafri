<section class="jumbotron1 "> 
  <!--
    <img  src="{{ asset('/content/upload/slide_01.png') }}" />
  -->
  <!--
  <div class="container brd_">
    <h1 class="jumbotron-heading">Album example</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p>
  </div>
  -->
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  @if(sizeof($Sliders)>=1)
    <ol class="carousel-indicators">
      @foreach($Sliders as $iCont_ => $Slider)
        <li data-target="#carousel-example-generic" data-slide-to="{{$iCont_}}" class="@if($iCont_==0) active @endif"></li>
      @endforeach
    </ol>

    <div class="carousel-inner ">
    @foreach($Sliders as $iCont_ => $Slider)
        <div class="carousel-item @if($iCont_==0) active @endif">
          @if(!empty($Slider->imageSlider))
              @if (file_exists( public_path().'/content/upload/'.$Slider->imageSlider ))
                <img  src="{{ asset('/content/upload/'.$Slider->imageSlider) }}" alt="Slider" />
              @else
              @endif
          @else
          @endif
          <div class="carousel-caption"> </div>
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

    
     
      
        <!--
        <div class="carousel-item">
          <img class="img-fluid" src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

          <div class="carousel-caption">
            Second Slide
          </div>
        </div>

        <div class="carousel-item">
          <img class="img-fluid" src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">

          <div class="carousel-caption">
            Third Slide
          </div>
        </div>
-->
      
        
  


</section>