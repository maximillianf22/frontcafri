<style type="text/css">
    /*

CC 2.0 License Iatek LLC 2018
Attribution required

*/
    /*
    code by Iatek LLC 2018 - CC 2.0 License - Attribution required
    code customized by Azmind.com
*/
    @media (min-width: 768px) and (max-width: 991px) {

        /* Show 4th slide on md if col-md-4*/
        .carousel-inner .active.col-md-4.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: absolute;
            top: 0;
            right: -33.3333%;
            /*change this with javascript in the future*/
            z-index: -1;
            display: block;
            visibility: visible;
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {

        /* Show 3rd slide on sm if col-sm-6*/
        .carousel-inner .active.col-sm-6.carousel-item+.carousel-item+.carousel-item {
            position: absolute;
            top: 0;
            right: -50%;
            /*change this with javascript in the future*/
            z-index: -1;
            display: block;
            visibility: visible;
        }
    }

    @media (min-width: 576px) {
        .carousel-item {
            margin-right: 0;
        }

        /* show 2 items */
        .carousel-inner .active+.carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item {
            transition: none;
        }

        .carousel-inner .carousel-item-next {
            position: relative;
            transform: translate3d(0, 0, 0);
        }

        /* left or forward direction */
        .active.carousel-item-left+.carousel-item-next.carousel-item-left,
        .carousel-item-next.carousel-item-left+.carousel-item,
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        /* farthest right hidden item must be also positioned for animations */
        .carousel-inner .carousel-item-prev.carousel-item-right {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            display: block;
            visibility: visible;
        }

        /* right or prev direction */
        .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
        .carousel-item-prev.carousel-item-right+.carousel-item,
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }
    }

    /* MD */
    @media (min-width: 768px) {

        /* show 3rd of 3 item slide */
        .carousel-inner .active+.carousel-item+.carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item {
            transition: none;
        }

        .carousel-inner .carousel-item-next {
            position: relative;
            transform: translate3d(0, 0, 0);
        }

        /* left or forward direction */
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        /* right or prev direction */
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }
    }

    /* LG */
    @media (min-width: 991px) {

        /* show 4th item */
        .carousel-inner .active+.carousel-item+.carousel-item+.carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item+.carousel-item {
            transition: none;
        }

        /* Show 5th slide on lg if col-lg-3 */
        .carousel-inner .active.col-lg-3.carousel-item+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: absolute;
            top: 0;
            right: -25%;
            /*change this with javascript in the future*/
            z-index: -1;
            display: block;
            visibility: visible;
        }

        /* left or forward direction */
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        /* right or prev direction //t - previous slide direction last item animation fix */
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }
    }
</style>
@if(sizeof($Offers_)>=1)
<!-- Top content -->

<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-md-8"><br>
            <h3 class="display-3">Ofertas del Día</h3>
            <p class="lead mt-1">¡No las dejes pasar Aprovecha!</p>
        </div>
    </div>
    <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            @foreach( $Offers_ as $item)
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 {{$loop->iteration == 1 ? 'active' : ''}}">
                <div id="product-{{$item->id}}" style="padding:5px 7px !important" onclick="viewProduct({{$item->id}})">
                    <div class="sc-item-store ">
                        <div class="categorie">
                            <!-- <b >
                                  {{$item->nameCategorie}}
                                  </b> -->
                            <div class="sticky "></div>
                        </div>
                        <div class="img-card-product-ql">
                            @if(!empty($item->imageProduct))
                            @if (file_exists( public_path().'/content/upload/store/'.$item->imageProduct ))
                            <img id="logoTheme" src="{{ asset('/content/upload/store/'.$item->imageProduct) }}" alt="Producto">
                            @else
                            $item->imageProduct
                            @endif
                            @else
                            $item->imageProduct
                            @endif
                        </div>
                        <div class="info-article ">
                            <div class="name">{{$item->nameProduct}}</div>
                            <!-- <div class="">{{$item->cntbyUnit}}</div> -->
                            <div class="info-price ">
                                <div class="item-price" style="text-align:center !important">
                                    $ {{ number_format($item->price, 0) }} {{$item->nameValue}} x {{$item->unidad_venta}}
                                </div>
                                @if($item->previous_price>=1)
                                <div class="previous-price txt-center">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@else
@endif

<script>
    function scroll_to(clicked_link, nav_height) {
        var element_class = clicked_link.attr('href').replace('#', '.');
        var scroll_to = 0;
        if (element_class != '.top-content') {
            element_class += '-container';
            scroll_to = $(element_class).offset().top - nav_height;
        }
        if ($(window).scrollTop() != scroll_to) {
            $('html, body').stop().animate({
                scrollTop: scroll_to
            }, 1000);
        }
    }


    jQuery(document).ready(function() {

        /*
            Navigation
        */
        $('a.scroll-link').on('click', function(e) {
            e.preventDefault();
            scroll_to($(this), $('nav').outerHeight());
        });

        /*
            Background
        */
        $('.section-4-container').backstretch("assets/img/backgrounds/bg.jpg");

        /*
             Wow
         */
        new WOW().init();

        /*
    Carousel
*/
        $('#carousel-example').on('slide.bs.carousel', function(e) {
            /*
                CC 2.0 License Iatek LLC 2018 - Attribution required
            */
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 5;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    } else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });

    });
</script>