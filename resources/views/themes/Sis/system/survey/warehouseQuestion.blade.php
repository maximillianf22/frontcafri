
     @if(sizeof($Categories_)>0)
          @foreach($Categories_ as $type_ )
          <a class="media media-single " href="#">
               <span class="title">{{$type_->nameCategorie}}</span>
               <span ><i class="lni-more-alt"></i></span>
          </a>
          @endforeach
     @else
     @endif
