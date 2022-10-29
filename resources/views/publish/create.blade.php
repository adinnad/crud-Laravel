@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div class="card">
    <div class="card-body">
      <form action="{{route('publish.store')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="form-group">
          <label for="titulo">Título da notícia</label>
          <input type="text" class="form-control" id="titulo" name="title">
        </div>
        <div class="form-group">
          <label for="subtitulo">Subtítuo da notícia</label>
          <input type="text" class="form-control" id="subtitulo" name="caption">
        </div>
        <div class="form-group">
          <label for="noticia">Sua notícia</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="200" name="text"></textarea>
        </div>
        <button class="btn btn-default btn-simple">Enviar</button>
      </form>
    </div>
  </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
