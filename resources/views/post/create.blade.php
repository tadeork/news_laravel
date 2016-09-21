@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>Formulario de creación</h1>
            {!! Form::open(['route' => 'posts.store', 'method' => 'post', 'autocomplete' => 'off', 'files' => 'true']) !!}
                {!! Field::text('title', ['label' => 'Título']) !!}
                {!! Field::textarea('content', ['label' => 'Escribe tu publicación', 'rows' => 10]) !!}
                {!! Field::file('photo',['label' => 'Foto']) !!}
                {!! Form::submit('Guardar', ['class' => 'btn btn-default btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection