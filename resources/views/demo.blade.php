@extends('layouts.app')


@section('content')
@include('layouts.header')
<section class="text-center p-5">
        <div id="fb-root"></div>

    <h4>NOTICIA DE ULTIMO MOMENTO</h4>
    <img width="100PX" src="/images/1573846135.jpg" alt="">
    <span>NOTICIAS DE ULTIMO MOMENTO</span>
    {{-- <iframe id="jinu" src="" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
        allowTransparency="true"></iframe> --}}
        <div class="fb-share-button" 
        data-href="https://www.ademonline.com/noticia" 
        data-layout="button_count">
      </div>
</section>

@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
    
           
        });
</script>
@endpush