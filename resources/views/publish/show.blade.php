@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

    <h1>{{$noticia->title}}</h1>
    <h3 style="font-size: 20px">{{$noticia->caption}}</h3></br></br>
    <p style="text-align: justify">{{$noticia->text}}</p>

@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
