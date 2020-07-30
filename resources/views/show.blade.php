@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('movie.index') }}" class="btn btn-primary">Volver</a>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->name }}</td>
                        <td>{{ $movie->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

