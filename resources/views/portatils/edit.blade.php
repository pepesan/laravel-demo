@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Portatil
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($portatil, ['route' => ['portatils.update', $portatil->id], 'method' => 'patch']) !!}

                        @include('portatils.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection