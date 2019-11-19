@extends('layouts.app')


@section('content')
@include('layouts.header')
<section class="text-center p-5">
        <div id="fb-root"></div>
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