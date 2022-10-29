@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

    <table>
        @foreach ($publish as $noticia)

            <tr>

                <td><h3 style="font-weight:500">{{$noticia->title}}</h3></td>

            </tr>

            <tr>

                <td>{{$noticia->caption}}</td>

            </tr>

            <tr>
                <td><a href="/dashboard/noticia/{{$noticia->id}}">Veja mais</a></td>
                <td><a href="/dashboard/edit/{{$noticia->id}}" class="btn btn-default btn-simple" style="width: 90px; height: 30px; padding: 6px">Editar</a></td>
                <td>
                    <form action="{{route('publish.destroy', $noticia->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-default btn-simple" style="width: 90px; height: 30px; padding: 6px">Deletar</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>


@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
