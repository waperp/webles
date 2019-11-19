@extends('layouts.app')


@section('content')
@include('layouts.header')
<section class="text-center p-5">
        <div id="fb-root"></div>
        <div class="fb-share-button" data-href="https://ademonline.com/noticia" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fademonline.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
        
</section>

@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
    
           
        });
</script>
@endpush