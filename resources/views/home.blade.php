@extends('layouts.app')


@section('content')
@include('layouts.header')
{{-- <div id="fb-root"></div>
<div class="fb-share-button" data-href="https://ademonline.com/" 
data-layout="button" data-size="small"><a target="_blank" 
href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fademonline.com%2F&amp;src=sdkpreparse" 
class="fb-xfbml-parse-ignore">Compartir</a></div> --}}

<!-- Bnner Section -->
@php
$ultimasNoticias = App\confrm::nivel(12);
$gallery = App\confrm::nivel(12);
$services = App\confrs::childrens(2);
@endphp
{{-- <section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        @if ($ultimasNoticias->sections->isEmpty())
        <div class="slide-item" id="menu-{{ Str::slug($ultimasNoticias->confrmttitl) }}"
            style="background-image: url(images/main-slider/1.jpg);">
            <div class="container xs-banner-container-parent">
                <div class="clearfix">

                    <div class="banner-column col-lg-6 col-md-12 col-sm-12">
                        <div class="title wow fadeInUp" data-wow-delay="250ms">Diagnosis</div>
                        <h2 class="wow fadeInUp" data-wow-delay="500ms">Personal care for your healthy living</h2>
                        <p class="text wow fadeInUp" data-wow-delay="750ms">Small river named Duden flows by their
                            place and supplies it with the necessary regelialia. It is a paradisematic country, in
                            which roasted parts of sentences fly into your mouth.</p>
                        <div class="link-box wow fadeInUp" data-wow-delay="1000ms">
                            <a href="department.html" class="theme-btn btn-style-two"><i>Book Now</i> <span
                                    class="arrow icon icon-arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="image">
                        <img src="images/main-slider/content-image-2.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        @endif
        @foreach ($ultimasNoticias->sections as $sections_ultimas_noticias)
        <div class="slide-item" id="menu-{{ Str::slug($ultimasNoticias->confrmttitl) }}"
            style="background-image: url(images/main-slider/1.jpg);">
            <div class="container xs-banner-container-parent">
                <div class="col-md-12">
                    <div class="row">
                        <!-- Content Column -->
                        <div class="banner-column col-lg-6 col-md-6 col-sm-12">
                            <div class="title wow fadeInUp" data-wow-delay="250ms"></div>
                            <a target="_blank"
                                href="/ultimas-noticias/{{ Str::slug($sections_ultimas_noticias->confrsttitl) }}/{{ $sections_ultimas_noticias->secconnuuid }}"
                                class="wow fadeInUp"
                                data-wow-delay="500ms">{{ Str::lower($sections_ultimas_noticias->confrsttitl )}}</a>

                            <p class="text wow fadeInUp" data-wow-delay="750ms">
                                {{ Str::limit($sections_ultimas_noticias->confrstdesc,140) }}</p>
                            <div class="link-box wow fadeInUp" data-wow-delay="1000ms">
                                <a href="/ultimas-noticias/{{ Str::slug($sections_ultimas_noticias->confrsttitl) }}/{{ $sections_ultimas_noticias->secconnuuid }}"
                                    class="theme-btn btn-style-two"><i>Ver Más</i> <span
                                        class="arrow icon icon-arrow_right"></span></a>
                            </div>
                        </div>

                        <!-- Image Column -->

                        <div class="image col-lg-6 col-md-6 col-sm-12">
                            <img src="images/{{ $sections_ultimas_noticias->confrsvbigi }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section> --}}
<div class="demo-cont" style="margin-top: 100px" id="menu-{{ Str::slug($ultimasNoticias->confrmttitl) }}">
    <!-- slider start -->
    <div class="fnc-slider example-slider">
      <div class="fnc-slider__slides">
        <!-- slide start -->
        @foreach ($ultimasNoticias->sections as $sections_ultimas_noticias)
        <div class="fnc-slide  @if ($loop->first) m--active-slide @endif">
            <div class="fnc-slide__inner" style="background-image: url(images/{{ $sections_ultimas_noticias->confrsvbigi }});">
              {{-- <div class="fnc-slide__mask" style="background-image: url(images/{{ $sections_ultimas_noticias->confrsvbigi }});">
                <div class="fnc-slide__mask-inner"></div>
              </div> --}}
              <div class="fnc-slide__content">
                <h2 class="fnc-slide__heading" >
                  <div class="fnc-slide__heading-line">
                    <span class="font-weight-bold">{{ Str::upper($sections_ultimas_noticias->confrsttitl )}}</span>
                  </div>
                  {{-- <div class="fnc-slide__heading-line">
                    <span>Widow</span>
                  </div> --}}
                </h2>
                {{-- <a href="/ultimas-noticias/{{ Str::slug($sections_ultimas_noticias->confrsttitl) }}/{{ $sections_ultimas_noticias->secconnuuid }}" type="button" class="fnc-slide__action-btn">
                  Ver más
                  <span data-text="Ver más">Ver más</span>
                </a> --}}
                <div class="link-box wow fadeInUp" data-wow-delay="1000ms">
                    <a href="/ultimas-noticias/{{ Str::slug($sections_ultimas_noticias->confrsttitl) }}/{{ $sections_ultimas_noticias->secconnuuid }}"
                        class="theme-btn btn-style-three pt-1 pb-1"><i>Ver Más</i> <span
                            class="arrow icon icon-arrow_right"></span></a>
                </div>
              </div>
              <nav class="fnc-nav">
                <div class="fnc-nav__bgs">
                  <div class="fnc-nav__bg  @if ($loop->first) m--active-nav-bg @endif "></div>
                </div>
                <div class="fnc-nav__controls ">
                  <a href="/ultimas-noticias/{{ Str::slug($sections_ultimas_noticias->confrsttitl) }}/{{ $sections_ultimas_noticias->secconnuuid }}" class="fnc-nav__control p-2" >
                    
                    <strong>{{ Str::limit($sections_ultimas_noticias->confrstdesc,80) }} <img src="images/icono-ver-mas_0.png" style="height: 100%; vertical-align: middle" alt=""></strong>
                    <span class="fnc-nav__control-progress"></span>
                  </a>
                 
                </div>
              </nav>
            </div>
          </div>
         
@endforeach
        
        <!-- slide end -->
        
      </div>
      
    </div>
    <!-- slider end -->
    
  </div>
<!-- End Bnner Section -->

<section id="services-form-section" class="services-form-section">
    <div class="image-layer" style="background-image:url(images/background/1.png)"></div>
    <div class="container ">
        
        <!-- Services Form -->
        <div  class="services-form">
                
            <!--Contact Form-->
                <div class="row justify-content-between">
                
                    <!--Form Group-->
                  
                    <!--Form Group-->
                    <div class="form-group col-4" >
                        <select id="select2-home-services"  class="form-control w-100" >
                            
                        </select>
                    </div>
                    
                    <!--Form Group-->
                    <div class="form-group button-group col-4">
                        <div class="left-curves"></div>
                        <div class="right-curves"></div>
                        <button class="theme-btn submit-btn" id="button-home-services"  type="button" >SERVICOS</button>
                    </div>
                
                </div>
                
        </div>

    </div>
</section>
<section class="services-section pt-2">

    <div class="container">
        
        <!-- Sec Title -->
        <div class="section-title text-center">
            {{-- <h2>Quick Amenities in Medizco</h2> --}}
            <p class="text" id="descripcion-home-services"></p>
        </div>
        
        <div class="row" id="lista-home-services">
            
            
        </div>
        
    </div>
</section>
@php
$quienesSomos = App\confrm::childrens(1);
@endphp
{{-- @foreach ($quienesSomos as $item)
<section class="news-section" id="menu-{{ Str::slug($item->confrmttitl) }}">
<div class="pattern-layer-one" style="background-image:url(images/background/pattern-6.png)"></div>
<div class="pattern-layer-two" style="background-image:url(images/background/pattern-7.png)"></div>
<div class="container">
    <!-- Sec Title -->
    <div class="section-title text-center">
        <h2>{{ $item->confrmttitl }}</h2>
        <div class="text">{{$item->confrmtdesc  }}</div>
    </div>
    <div class="news-carousel owl-carousel owl-theme">

        <!-- News Block -->


        @foreach ($item->sections as $childrens)
        <div class="news-block">
            <div class="inner-box">
                <div class="image">
                    <a href="blog-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
                    {{-- <div class="post-date"><strong>{{ $childrens->confrsscode }}</strong>dec</div> -
            </div>
            <div class="lower-content">
                <ul class="post-meta">
                    {{-- <li><a href="blog-detail.html"><span class="icon icon-user"></span>Oliver Liam</a></li>
                            <li><a href="blog-detail.html"><span class="icon icon-folders"></span>Surgical</a></li> 
                        </ul>
                        <h3><a href="#">{{ $childrens->confrsttitl }}</a></h3>
                    <span>{{ $childrens->confrstdesc }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</section>
@endforeach --}}


@foreach ($quienesSomos as $item)
<!-- Services Section -->
<section class="services-section">
    <div class="container">

        <!-- Sec Title -->
        <div class="section-title text-center">
            <h2>{{ $item->confrmttitl }}</h2>
            <p id="menu-{{ Str::slug($item->confrmttitl) }}" class="text">{{$item->confrmtdesc }}</p>
        </div>

        <div class="row">
            @foreach ($item->sections as $childrens)
            <!-- Featured Block -->
            <div class="featured-block style-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-layer"
                        style="background-image:url(images/{{ $childrens->confrsvbigi }});background-size:cover;background-position: center center ">
                    </div>
                    <div class="icon-box">
                        {{-- <span class="icon icon-brifecase-hospital2"></span> --}}
                        <img src="/images/{{  $childrens->confrsvbigi }}" alt="">
                    </div>
                    <h3 class="text-center"><a href="#">{{ $childrens->confrsttitl }}</a></h3>
                    <p class="text-center">{{Str::limit( $childrens->confrstdesc,30) }}</p>
                    <div class="link-box wow fadeInUp  text-center mt-2" data-wow-delay="1000ms">
                        <a href="/quienes-somos/{{ Str::slug($item->confrmttitl) }}/{{ $childrens->secconnuuid }}"
                            class="theme-btn btn-style-two other"><i>Ver Más</i> <span
                                class="arrow icon icon-arrow_right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach

<!-- End Services Section -->
<!-- End News Section -->

@php
$gallery_img = App\confrs::gallery();
$gallery = App\confrm::nivel(15);
$gestionarSucursales_home = App\confrs::gallery_sucursales();
$gestionarContactos = App\confrm::nivel(19);

@endphp
<section class="gallery-section">
    <div class="image-layer" style="background-image:url(images/background/4.jpg)"></div>
    <div class="container">
        <div class="title-box">
            <h2 id="menu-{{ Str::slug($gallery->confrmttitl) }}">Galeria LES</h2>
        </div>

        <div class="row">

            <!-- Project Block -->
            @foreach ($gallery_img as $itemGallery)
            <div class="project-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <img src="/images/{{ $itemGallery->confrsvbigi }}" alt="" />
                        <!-- Overlay Box -->
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="overlay-content">
                                    <div class="icon-box">
                                        <span class="icon icon-heart1"></span>
                                    </div>
                                    <h3><a target="_blank" href="/galeria/{{ Str::slug($itemGallery->confrsttitl) }}/{{ $itemGallery->secconnuuid }}">{{ $itemGallery->confrsttitl }}</a></h3>
                                    <a class="plus"  href="/images/{{ $itemGallery->confrsvbigi }}" data-fancybox="gallery-1" data-caption=""><span class="flaticon-plus-symbol"></span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <!-- Button Box -->
        <div class="button-box text-center">
            <a href="gallery.html" class="theme-btn btn-style-three">ver Todo <span
                    class="arrow icon-chevron-right"></span></a>
        </div>

    </div>
</section>

<div class="main" id="menu-{{ Str::slug($gestionarContactos->confrmttitl) }}">
    <div class="page_container">
      <div id="immersive_slider" >
          @foreach ($gestionarSucursales_home as $gestionarSucursalesobj)
          <div class="slide" data-blurred="/images/slide1_blurred.jpg">
            <div class="content">
            <h2 class="text-center">{{$gestionarSucursalesobj->confrsttitl}}</h2>
            <div class="google-maps-slide"  id="map-{{$gestionarSucursalesobj->concooscode}}"></div>
  
              </div>
            <div class="image">
              <a  target="_blank">
                <img src="/images/{{$gestionarSucursalesobj->confrsvbigi}}" alt="Slider 1">
              </a>
            </div>
          </div>
          @endforeach
        {{--  --}}
        
        
        <a href="#" class="is-prev">&laquo;</a>
        <a href="#" class="is-next">&raquo;</a>
      </div>
    </div>
    </div>
<!-- End Fullwidth Section -->

<!--Main Footer-->
<footer class="main-footer" style="background-image:url(images/background/7.jpg)">
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="clearfix">

                <div class="pull-left">
                    <!-- Copyright -->
                    <p class="copyright">&copy; 2020, LES. Todo los derechos reservados.</p>
                </div>

                <div class="pull-right">
                    <ul class="social-box">
                        <li class="messanger"><a href="#"><span class="icon flaticon-messenger"></span>
                                LES</a></li>
                        <li class="facebook"><a href="#" class="icon icon-facebook"></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</footer>

<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon icon-chevron-up"></span></div>

<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    <span class="icon icon-cross"></span>
                </a>
            </div>
            <div class="sidebar-textwidget">

                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo-2.png" alt="" /></a>
                        </div>
                        <div class="content-box">
                            <h2>About Us</h2>
                            <p class="text">We must explain to you how all seds this mistakens idea off denouncing
                                pleasures and praising pain was born and I will give you a completed accounts off the
                                system and expound.</p>
                            <a href="#" class="theme-btn btn-style-one"><i>Consultation</i></a>
                        </div>
                        <div class="contact-info">
                            <h2>Contact Info</h2>
                            <ul class="list-style-one">
                                <li><span class="icon flaticon-map-1"></span>Rock St 12, Newyork City, USA</li>
                                <li><span class="icon flaticon-telephone"></span>(000) 000-000-0000</li>
                                <li><span class="icon flaticon-letter"></span>Medizco@gmail.com</li>
                                <li><span class="icon flaticon-clock-2"></span>Week Days: 09.00 to 18.00 Sunday: Closed
                                </li>
                            </ul>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li class="facebook"><a href="#" class="icon icon-facebook"></a></li>
                            <li class="twitter"><a href="#" class="icon icon-twitter"></a></li>
                            <li class="linkedin"><a href="#" class="icon icon-linkedin"></a></li>
                            <li class="instagram"><a href="#" class="icon icon-instagram"></a></li>
                            <li class="youtube"><a href="#" class="icon icon-youtube"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END sidebar widget item -->

<!-- sidebar cart item -->
<div class="xs-sidebar-group cart-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading media">
                <div class="media-body">
                    <a href="#" class="close-side-widget">
                        <span class="icon icon-cross"></span>
                    </a>
                </div>
            </div>
            <div class="xs-empty-content">

                <!-- Cart Product -->
                <div class="cart-product">
                    <div class="inner">
                        <div class="cross-icon"><span class="icon icon-cross"></span></div>
                        <div class="image"><img src="images/resource/treatment-one.jpg" alt="" /></div>
                        <h3><a href="shop-single.html">Treatment One</a></h3>
                        <div class="quantity-text">Quantity 1</div>
                        <div class="price">$39.00</div>
                    </div>
                </div>
                <!-- Cart Product -->
                <div class="cart-product">
                    <div class="inner">
                        <div class="cross-icon"><span class="icon icon-cross"></span></div>
                        <div class="image"><img src="images/resource/treatment-two.jpg" alt="" /></div>
                        <h3><a href="shop-single.html">Treatment Two</a></h3>
                        <div class="quantity-text">Quantity 1</div>
                        <div class="price">$69.00</div>
                    </div>
                </div>
                <!-- Cart Product -->
                <div class="cart-product">
                    <div class="inner">
                        <div class="cross-icon"><span class="icon icon-cross"></span></div>
                        <div class="image"><img src="images/resource/treatment-three.jpg" alt="" /></div>
                        <h3><a href="shop-single.html">Treatment Three</a></h3>
                        <div class="quantity-text">Quantity 1</div>
                        <div class="price">$99.00</div>
                    </div>
                </div>
                <p class="xs-btn-wraper">
                    <a class="btn btn-style-three" href="#">Return To Shop</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- END sidebar cart item -->

<!-- xs modal -->
<div class="zoom-anim-dialog mfp-hide modal-searchPanel" id="modal-popup-2">
    <div class="xs-search-panel">
        <form action="#" method="POST" class="xs-search-group">
            <input type="search" class="form-control" name="search" id="search" placeholder="Search">
            <button type="submit" class="search-button"><i class="icon icon-search"></i></button>
        </form>
    </div>
</div><!-- End xs modal -->
<!-- end language switcher strart -->

@endsection