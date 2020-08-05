@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col-12">listado de Cosa</h2>
            <a href="{{ route('cosa.create') }}"
               class="btn btn-primary">Create</a>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr><th>Name</th><th>Action</th></tr>
                </thead>
                <tbody>
                @foreach($cosas as $cosa)
                    <tr>
                        <td>{{ $cosa->nombre }}</td>
                        <td>Aquí irán las acciones</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

