@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Formulario de alta</h2>
            <div class="col-md-10 col-md-offset-1">
            {!! Form::open(['route' => 'cosa.store', 'method' => 'post', 'novalidate']) !!} <!--definimos el formulario-->
                <div class="form-group"> <!-- metemos un campo -->
                    {!! Form::label('full_name', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group"> <!--botón de enviar-->
                    {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                    <a href="{{ route('cosa.index') }}" class="btn btn-primary">Volver</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
