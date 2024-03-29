@extends('layouts.app')


@section('content')
@include('layouts.header')
<section class="booking-section">
    <div class="pattern-layer-one" style="background-image:url(images/background/pattern-16.png)"></div>
    <div class="pattern-layer-two" style="background-image:url(images/background/pattern-17.png)"></div>
    <div class="container">
        <div class="row">
            <!-- Video Column -->
            <div class="video-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="transparent-layer"></div>
                    <div class="green-layer"></div>
                    <!--Video Box-->
                    <div class="video-box">
                        <div class="image">
                            <img src="/images/{{ $data->confrsvbigi }}" alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column pt-0">
                    <h2>{{ $data->confrsttitl }}</h2>
                    <div id="descripcion-general-div"><p class="mb-1" id="descripcion-general">{{ $data->confrstdesc }}</p></div>
                    <a href="/" class="theme-btn btn-style-two"><span class="arrow icon icon-chevron-left"></span> <i>Volver atrás</i> </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
    
           
        });
</script>
@endpush
