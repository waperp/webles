@extends('layouts.app')


@section('content')
@include('layouts.header')
{{ $data->confrstdesc }}

@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
    
           
        });
</script>
@endpush
