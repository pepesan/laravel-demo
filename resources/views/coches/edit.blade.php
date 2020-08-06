@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Coche
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($coche, ['route' => ['coches.update', $coche->id], 'method' => 'patch']) !!}

                        @include('coches.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection