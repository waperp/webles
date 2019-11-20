@extends('layouts.app')


@section('content')
@include('layouts.header')
<div class="fb-share-button" data-href="https://ademonline.com/noticia" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fademonline.com%2Fnoticia&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>

@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
    
           
        });
</script>
@endpush