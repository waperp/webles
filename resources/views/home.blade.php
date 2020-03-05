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
              <div class="fnc-slide__mask" style="background-image: url(images/{{ $sections_ultimas_noticias->confrsvbigi }});">
                <div class="fnc-slide__mask-inner"></div>
              </div>
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
                        class="theme-btn btn-style-two pt-1 pb-1"><i>Ver Más</i> <span
                            class="arrow icon icon-arrow_right"></span></a>
                </div>
              </div>
              <nav class="fnc-nav">
                <div class="fnc-nav__bgs">
                  <div class="fnc-nav__bg  @if ($loop->first) m--active-nav-bg @endif "></div>
                </div>
                <div class="fnc-nav__controls ">
                  <a href="/ultimas-noticias/{{ Str::slug($sections_ultimas_noticias->confrsttitl) }}/{{ $sections_ultimas_noticias->secconnuuid }}" class="fnc-nav__control p-2" >
                    <strong>{{ Str::limit($sections_ultimas_noticias->confrstdesc,60) }}</strong>
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


<!-- Featured Section -->
{{-- <section class="featured-section">
    <div class="pattern-layer" style="background-image:url(images/background/pattern-1.png)"></div>
    <div class="container">
        <div class="row">

            <!-- Featured Block -->
            <div class="featured-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-layer" style="background-image:url(images/resource/feature-1.jpg)"></div>
                    <div class="icon-box">
                        <span class="icon flaticon-pill"></span>
                    </div>
                    <h3><a href="#">Specialised <br> Support</a></h3>
                    <p>The hospital plays a statewide role in rehabilitation services, which includes the Acquired
                    </p>
                </div>
            </div>

            <!-- Featured Block -->
            <div class="featured-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="image-layer" style="background-image:url(images/resource/feature-1.jpg)"></div>
                    <div class="icon-box">
                        <span class="icon icon-diagnosis"></span>
                    </div>
                    <h3><a href="#">Diagnosis & <br> Investigation</a></h3>
                    <p>Hospital doctors examine patients so that they can diagnose and treat health conditions</p>
                </div>
            </div>

            <!-- Featured Block -->
            <div class="featured-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="image-layer" style="background-image:url(images/resource/feature-1.jpg)"></div>
                    <div class="icon-box">
                        <span class="icon icon-medical1"></span>
                    </div>
                    <h3><a href="#">Medical & <br> Surgical</a></h3>
                    <p>Medicine is a very wide field with many possible specialisms. Some doctors work in general
                    </p>
                </div>
            </div>

        </div>
    </div>
</section> --}}
<!-- End Featured Section -->

<!-- Fullwidth Section -->
{{-- <section class="container-fluid">
    <div class="pattern-layer" style="background-image:url(images/background/pattern-2.png)"></div>
    <div class="outer-section">
        <div class="clearfix">

            <!-- Left Column -->
            <div class="left-column">
                <div class="inner-column">
                    <div class="shadow-one paroller" style="background-image:url(images/icons/shadow-1.png)"
                        data-paroller-factor="0.15" data-paroller-factor-lg="0.15" data-paroller-factor-md="0.15"
                        data-paroller-factor-sm="0.15" data-paroller-type="foreground"
                        data-paroller-direction="horizontal"></div>
                    <div class="shadow-two paroller" style="background-image:url(images/icons/shadow-2.png)"
                        data-paroller-factor="-0.15" data-paroller-factor-lg="-0.15" data-paroller-factor-md="-0.15"
                        data-paroller-factor-sm="-0.15" data-paroller-type="foreground"
                        data-paroller-direction="vertical"></div>
                    <div class="shadow-three paroller" style="background-image:url(images/icons/shadow-3.png)"
                        data-paroller-factor="0.15" data-paroller-factor-lg="0.15" data-paroller-factor-md="0.15"
                        data-paroller-factor-sm="0.15" data-paroller-type="foreground"
                        data-paroller-direction="horizontal"></div>
                    <div class="image">
                        <img src="images/resource/image-1.png" alt="" />
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <div class="inner-column">
                    <h2>Hospital doctors examine patients so that they can diagnose</h2>
                    <ul class="featured-list">
                        <li class="wow fadeInUp clearfix" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <span class="icon icon-brifecase-hospital2"></span>
                            <div class="content">
                                <div class="title">Intensive care</div>
                                <p>Behind the word mountains, far from the countries Vokalia and Consonantia, there
                                    live the blind texts.</p>
                            </div>
                        </li>
                        <li class="wow fadeInUp clearfix" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <span class="icon icon-heart1"></span>
                            <div class="content">
                                <div class="title">Specialised Support Service</div>
                                <p>Behind the word mountains, far from the countries Vokalia and Consonantia, there
                                    live the blind texts.</p>
                            </div>
                        </li>
                        <li class="wow fadeInUp clearfix" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <span class="icon icon-doctor"></span>
                            <div class="content">
                                <div class="title">Medical & Surgical</div>
                                <p>Behind the word mountains, far from the countries Vokalia and Consonantia, there
                                    live the blind texts.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section> --}}
@php
$gallery_img = App\confrs::gallery();
$gallery = App\confrm::nivel(15);
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

<div class="main">
    <div class="page_container">
      <div id="immersive_slider">
        <div class="slide" data-blurred="/images/slide1_blurred.jpg">
          <div class="content">
            <h2><a href="http://www.bucketlistly.com" target="_blank">BucketListly</a></h2>
            <div style="height: 150px" id="map"></div>

            </div>
          <div class="image">
            <a href="http://www.bucketlistly.com" target="_blank">
              <img src="/images/slide1.jpg" alt="Slider 1">
            </a>
          </div>
        </div>
        <div class="slide" data-blurred="/images/slide2_blurred.jpg">
          <div class="content">
            <h2><a href="http://www.bucketlistly.com/apps" target="_blank">BucketListly Apps</a></h2>
            <p>It’s never been easier to watch YouTube on the big screen
            Send your favorite YouTube videos from your Android phone or tablet to TV with the touch of a button. It’s easy. No wires, no setup, no nothing. Find out more here.</p>
          </div>
          <div class="image">
           <a href="http://www.bucketlistly.com/apps" target="_blank"> <img src="/images/slide2.jpg" alt="Slider 1"></a>
          </div>
        </div>
        <div class="slide" data-blurred="/images/slide3_blurred.jpg">
          <div class="content">
            <h2><a href="http://www.thepetedesign.com" target="_blank">The Pete Design</a></h2>
            <p>It’s never been easier to watch YouTube on the big screen
            Send your favorite YouTube videos from your Android phone or tablet to TV with the touch of a button. It’s easy. No wires, no setup, no nothing. Find out more here.</p>
          </div>
          <div class="image">
            <a href="http://www.thepetedesign.com" target="_blank"><img src="/images/slide3.jpg" alt="Slider 1"></a>
          </div>
        </div>
        
        <a href="#" class="is-prev">&laquo;</a>
        <a href="#" class="is-next">&raquo;</a>
      </div>
    </div>
    </div>
<!-- End Fullwidth Section -->

<!-- Team Section -->
{{-- <section class="team-section">
    <div class="team-pattern-layer" style="background-image:url(images/background/pattern-1.png)"></div>
    <div class="team-pattern-layer-two" style="background-image:url(images/background/pattern-5.png)"></div>
    <div class="container">

        <!-- Sec Title -->
        <div class="section-title text-center">
            <h2>Meet Our Specialist</h2>
            <p class="text">The hospital plays a statewide role in rehabilitation services, which includes the
                Acquired</p>
        </div>

        <div class="team-carousel owl-carousel owl-theme">

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-1.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Andrew Sebastian</a></h3>
                        <p class="designation">Dermatologist</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-2.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Thomas Henry</a></h3>
                        <p class="designation">Cardiology</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-3.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">James Alexander</a></h3>
                        <p class="designation">Radiology</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-4.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Harrison Samuel</a></h3>
                        <p class="designation">Anaesthetics</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-1.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Andrew Sebastian</a></h3>
                        <p class="designation">Dermatologist</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-2.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Thomas Henry</a></h3>
                        <p class="designation">Cardiology</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-3.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">James Alexander</a></h3>
                        <p class="designation">Radiology</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-4.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Harrison Samuel</a></h3>
                        <p class="designation">Anaesthetics</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-1.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Andrew Sebastian</a></h3>
                        <p class="designation">Dermatologist</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-2.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Thomas Henry</a></h3>
                        <p class="designation">Cardiology</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-3.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">James Alexander</a></h3>
                        <p class="designation">Radiology</p>
                    </div>
                </div>
            </div>

            <!-- Team Block -->
            <div class="team-block">
                <div class="inner-box">
                    <div class="image">
                        <img src="images/resource/team-4.jpg" alt="" />
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <ul class="team-social-box">
                                    <li class="youtube"><a href="#" class="icon icon-youtube"></a><span
                                            class="social-name">youtube</span></li>
                                    <li class="linkedin"><a href="#" class="icon icon-linkedin"></a><span
                                            class="social-name">linkedin</span></li>
                                    <li class="facebook"><a href="#" class="icon icon-facebook"></a><span
                                            class="social-name">facebook</span></li>
                                    <li class="twitter"><a href="#" class="icon icon-twitter"></a><span
                                            class="social-name">twitter</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="icon-box">
                            <span class="icon icon-heart1"></span>
                        </div>
                        <h3><a href="#">Harrison Samuel</a></h3>
                        <p class="designation">Anaesthetics</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}
<!-- End Team Section -->

<!-- Appointment Section -->
{{-- <section class="appointment-section">
    <div class="pattern-layer" style="background-image:url(images/background/pattern-1.png)"></div>
    <div class="container">
        <div class="title-box">
            <h2>With access to 24 hour emergency assistance, you can continue to help others.</h2>
        </div>
        <div class="inner-section">
            <div class="row">

                <!-- Form Column -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="form-column">
                        <div class="inner-column">
                            <h3>Fill up the form</h3>
                            <!-- Calender Form -->
                            <div class="calender-form">

                                <!--Contact Form-->
                                <form method="post" action="contact.html">

                                    <!--Form Group-->
                                    <div class="form-group">
                                        <label><span class="icon icon-doctor"></span> Purpose for Visit</label>
                                        <select class="custom-select-box">
                                            <option>Select Visit Type</option>
                                            <option>Type One</option>
                                            <option>Type Two</option>
                                            <option>Type Three</option>
                                            <option>Type Four</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label><span class="icon flaticon-new-user"></span> Enter your Name</label>
                                        <input type="text" name="username" placeholder="Type your name" required>
                                    </div>

                                    <div class="form-group">
                                        <label><span class="icon icon-envelope"></span> Your Mail Address</label>
                                        <input type="text" name="email" placeholder="Email" required>
                                    </div>

                                    <div class="form-group">
                                        <label><span class="icon flaticon-phone-receiver"></span> Your Mail
                                            Address</label>
                                        <input type="text" name="phone" placeholder="Phone" required>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Calender Column -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="calender-column">
                        <div class="inner-column">
                            <!-- Calender Title -->
                            <div class="calender-title">
                                <div class="title">Need emergency?</div>
                                <h3>Book an <span class="theme_color">Appointment</span></h3>
                            </div>

                            <div class="calender-carousel owl-carousel owl-theme">

                                <!-- Calender Block -->
                                <div class="calender-block">
                                    <div class="block-outer">
                                        <div class="inner-box">
                                            <!-- Days Boxed -->
                                            <div class="days-boxed">
                                                <div class="clearfix">
                                                    <div class="day-date"><strong>Mon</strong>10 Oct 2018</div>
                                                    <div class="day-date"><strong>tue</strong>11 Oct 2018</div>
                                                    <div class="day-date"><strong>wed</strong>12 Oct 2018</div>
                                                    <div class="day-date"><strong>thu</strong>13 Oct 2018</div>
                                                    <div class="day-date"><strong>fri</strong>14 Oct 2018</div>
                                                </div>
                                            </div>

                                            <!-- Time Boxed -->
                                            <div class="time-boxed">
                                                <div class="clearfix">
                                                    <div class="time">08:30</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:00</div>
                                                </div>
                                            </div>

                                            <!-- More Boxed -->
                                            <div class="more-boxed">
                                                <div class="clearfix">
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Button Box -->
                                        <div class="button-box">
                                            <a href="#" class="theme-btn btn-style-transparent">Cancel <span
                                                    class="arrow icon icon-arrow_right"></span></a>
                                            <a href="#" class="theme-btn btn-style-three">Book Now <span
                                                    class="arrow icon-arrow_right"></span></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Calender Block -->
                                <div class="calender-block">
                                    <div class="block-outer">
                                        <div class="inner-box">
                                            <!-- Days Boxed -->
                                            <div class="days-boxed">
                                                <div class="clearfix">
                                                    <div class="day-date"><strong>Mon</strong>10 Oct 2018</div>
                                                    <div class="day-date"><strong>tue</strong>11 Oct 2018</div>
                                                    <div class="day-date"><strong>wed</strong>12 Oct 2018</div>
                                                    <div class="day-date"><strong>thu</strong>13 Oct 2018</div>
                                                    <div class="day-date"><strong>fri</strong>14 Oct 2018</div>
                                                </div>
                                            </div>

                                            <!-- Time Boxed -->
                                            <div class="time-boxed">
                                                <div class="clearfix">
                                                    <div class="time">08:30</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:00</div>
                                                </div>
                                            </div>

                                            <!-- More Boxed -->
                                            <div class="more-boxed">
                                                <div class="clearfix">
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Button Box -->
                                        <div class="button-box">
                                            <a href="#" class="theme-btn btn-style-transparent">Cancel <span
                                                    class="arrow icon icon-arrow_right"></span></a>
                                            <a href="#" class="theme-btn btn-style-three">Book Now <span
                                                    class="arrow icon-arrow_right"></span></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Calender Block -->
                                <div class="calender-block">
                                    <div class="block-outer">
                                        <div class="inner-box">
                                            <!-- Days Boxed -->
                                            <div class="days-boxed">
                                                <div class="clearfix">
                                                    <div class="day-date"><strong>Mon</strong>10 Oct 2018</div>
                                                    <div class="day-date"><strong>tue</strong>11 Oct 2018</div>
                                                    <div class="day-date"><strong>wed</strong>12 Oct 2018</div>
                                                    <div class="day-date"><strong>thu</strong>13 Oct 2018</div>
                                                    <div class="day-date"><strong>fri</strong>14 Oct 2018</div>
                                                </div>
                                            </div>

                                            <!-- Time Boxed -->
                                            <div class="time-boxed">
                                                <div class="clearfix">
                                                    <div class="time">08:30</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">08:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">09:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:30</div>
                                                    <div class="time">10:00</div>
                                                    <div class="time">10:00</div>
                                                </div>
                                            </div>

                                            <!-- More Boxed -->
                                            <div class="more-boxed">
                                                <div class="clearfix">
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                    <div class="more">more...</div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Button Box -->
                                        <div class="button-box">
                                            <a href="#" class="theme-btn btn-style-transparent">Cancel <span
                                                    class="arrow icon icon-arrow_right"></span></a>
                                            <a href="#" class="theme-btn btn-style-three">Book Now <span
                                                    class="arrow icon icon-arrow_right"></span></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section> --}}
<!-- End Appointment Section -->

<!-- Emergency Section -->
{{-- <section class="emergency-section" style="background-image:url(images/background/3.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <!-- Content Box -->
                <div class="content-box">
                    <div class="inner-box">
                        <h2><span class="icon-box flaticon-24-hours"></span><strong>Emergency</strong> Medical Care
                            24/7</h2>
                        <p class="text">With access to 24 hour emergency assistance, It’s so important you can
                            continue to help others.</p>
                        <p class="phone"><a href="tel:812-243-7969"><span
                                    class="icon-box icon-phone_call"></span>812-243-7969</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> --}}
<!-- End Emergency Section -->


<!-- Gallery Section -->

<!-- End Gallery Section -->

<!-- Events Section -->
{{-- <section class="events-section">
    <div class="pattern-layer-two" style="background-image:url(images/background/pattern-5.png)"></div>
    <div class="container">
        <!-- Title Box -->
        <div class="title-box">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>Recent Events</h2>
                </div>
                <div class="pull-right">
                    <a href="#" class="view-events">View all Events <span class="arrow fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>

        <!-- Inner Container -->
        <div class="inner-container">
            <div class="pattern-layer-one" style="background-image:url(images/background/pattern-4.png)"></div>
            <div class="row">

                <!-- Column -->
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    <!-- Event Block -->
                    <div class="event-block">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="upper-box clearfix">
                                <!-- Event Date -->
                                <div class="event-date">
                                    <strong>25</strong>Dec
                                </div>
                                <div class="image">
                                    <img src="images/resource/author-1.jpg" alt="" />
                                </div>
                                <ul class="event-list">
                                    <li><span class="icon icon-map-marker2"></span>Destiny Hall, 5th Floor</li>
                                    <li><span class="icon icon-clock3"></span>10am to 3pm</li>
                                </ul>
                            </div>
                            <h3><a href="appointment.html">National Assessment and Accrediation for Council Peer
                                    Team Visited...</a></h3>
                            <a href="event-detail.html" class="theme-btn btn-style-four">join now <span
                                    class="arrow fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="column col-lg-6 col-md-12 col-sm-12">

                    <!-- Event Block Two -->
                    <div class="event-block-two">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content clearfix">
                                <!-- Event Date -->
                                <div class="event-date">
                                    <strong>26</strong>Dec
                                </div>
                                <ul class="event-list">
                                    <li><span class="icon icon-map-marker2"></span>Charlotte Hall</li>
                                    <li><span class="icon icon-clock3"></span>10am to 3pm</li>
                                </ul>
                                <h3><a href="appointment.html">Medicine is a very wide field with many possible
                                        specialisms...</a></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Event Block Two -->
                    <div class="event-block-two">
                        <div class="inner-box wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="content clearfix">
                                <!-- Event Date -->
                                <div class="event-date">
                                    <strong>28</strong>Dec
                                </div>
                                <ul class="event-list">
                                    <li><span class="icon icon-map-marker2"></span>Royal Lounge</li>
                                    <li><span class="icon icon-clock3"></span>10am to 3pm</li>
                                </ul>
                                <h3><a href="appointment.html">Hospital doctors examine patients so that they can
                                        diagnose...</a></h3>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section> --}}
<!-- End Events Section -->

<!-- Testimonial Section -->
{{-- <section class="testimonial-section">
    <div class="container">
        <!-- Sec Title -->
        <div class="section-title text-center">
            <h2>Service Recipient Says</h2>
        </div>

        <div class="testimonials-carousel owl-carousel owl-theme">

            <!-- Testimonial Block -->
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="content-box">
                        <div class="quote-icon icon-quote2"></div>
                        <p class="text">Oxmox advised her not to do so, because there were thousands of bad Commas,
                            wild Question Marks and devious.</p>
                        <h3>Kolis Muller</h3>
                        <p class="designation">NY Citizen</p>
                    </div>
                    <div class="image-box">
                        <img src="images/resource/author-2.png" alt="" />
                    </div>
                </div>
            </div>

            <!-- Testimonial Block -->
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="content-box">
                        <div class="quote-icon icon-quote2"></div>
                        <p class="text">Oxmox advised her not to do so, because there were thousands of bad Commas,
                            wild Question Marks and devious.</p>
                        <h3>Kolis Muller</h3>
                        <p class="designation">NY Citizen</p>
                    </div>
                    <div class="image-box">
                        <img src="images/resource/author-3.png" alt="" />
                    </div>
                </div>
            </div>

            <!-- Testimonial Block -->
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="content-box">
                        <div class="quote-icon icon-quote2"></div>
                        <p class="text">Oxmox advised her not to do so, because there were thousands of bad Commas,
                            wild Question Marks and devious.</p>
                        <h3>Kolis Muller</h3>
                        <p class="designation">NY Citizen</p>
                    </div>
                    <div class="image-box">
                        <img src="images/resource/author-4.png" alt="" />
                    </div>
                </div>
            </div>

        </div>

    </div>
</section> --}}
<!-- End Testimonial Section -->



<!--Sponsors Section-->
{{-- <section class="sponsors-section">
    <div class="container">

        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure>
                </li>
            </ul>
        </div>

    </div>
</section> --}}
<!--End Sponsors Section-->

<!-- Fullwidth Section -->
{{-- <section class="fullwidth-section-two">
    <div class="outer-container">
        <div class="clearfix">

            <!-- Left Column -->
            <div class="left-column" style="background-image:url(images/background/5.jpg)">
                <div class="inner-column">
                    <h2>Subscribe to our <br> Newsletter</h2>
                    <!-- Subscribe Form -->
                    <div class="subscribe-form">
                        <form method="post" action="contact.html">
                            <div class="form-group">
                                <input type="email" name="email" value="" placeholder="Enter your mail here" required>
                                <button type="submit" class="theme-btn subscribe-btn"><span
                                        class="icon icon-envelope3"></span> Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <!-- Text -->
                    <p class="text">***We Promise, no spam!</p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column" style="background-image:url(images/background/6.jpg)">
                <div class="inner-column">
                    <!-- Phone -->
                    <a href="tel:+1-812-243-7969" class="phone">
                        <span class="icon-box flaticon-24-hours"></span>
                        <span class="title">Emergency Medical Care</span><strong>+1-812-243-7969</strong>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section> --}}
<!-- End Fullwidth Section Section -->

<!--Main Footer-->
<footer class="main-footer" style="background-image:url(images/background/7.jpg)">
{{-- 
    <div class="container">

        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row">

                <!-- Logo Widget-->
                <div class="footer-column col-lg-6 col-md-6">
                    <div class="footer-widget logo-widget">
                        <div class="logo">
                            <a href="index.html"><img src="images/footer-logo.png" alt="" /></a>
                        </div>
                        <p class="text">Behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                            the Semantics, a large language ocean. A small river named Duden flows by their place
                            and supplies it with the necessary</p>
                        <ul class="list-style-two">
                            <li><a href="contact.html#map-location"><span
                                        class="icon  flaticon-map-pin-marked"></span>29 Union Square W <br> New
                                    York, NY 10003, USA</a></li>
                            <li><a href="tel:+1-212-243-7969"><span
                                        class="icon flaticon-phone"></span>+1-212-243-7969</a></li>
                            <li><a href="mailto:info@example.com"><span
                                        class="icon flaticon-mail"></span>info@example.com</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Links Widget-->
                <div class="footer-column col-lg-3 col-md-6">
                    <div class="footer-widget link-widget">
                        <h2>Our Departments</h2>
                        <ul class="footer-list">
                            <li><a href="#">Trauma & intensive care</a></li>
                            <li><a href="#">Aged Care</a></li>
                            <li><a href="#">Community Services</a></li>
                            <li><a href="#">Diagnosis & Investigation</a></li>
                            <li><a href="#">Medical & Surgical</a></li>
                            <li><a href="#">Mental Health</a></li>
                            <li><a href="#">Rehabitation</a></li>
                            <li><a href="#">Specialised Support Service</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Links Widget-->
                <div class="footer-column col-lg-3 col-md-6">
                    <div class="footer-widget times-widget">
                        <h2>We’re Avtailable</h2>
                        <ul class="time-list">
                            <li>Monday :<span>08.00 - 10.00</span></li>
                            <li>Tuesday :<span>08.00 - 10.00</span></li>
                            <li>Wednesday :<span>08.00 - 10.00</span></li>
                            <li>Tuesday :<span>08.00 - 10.00</span></li>
                            <li>Thursday :<span>08.00 - 10.00</span></li>
                            <li>Friday :<span>09.00 - 07.00</span></li>
                            <li>Saturday :<span>10.00 - 05.00</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div> --}}

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
                        <li class="linkedin"><a href="#" class="icon icon-linkedin"></a></li>
                        <li class="twitter"><a href="#" class="icon icon-twitter"></a></li>
                        <li class="youtube"><a href="#" class="icon icon-youtube"></a></li>
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