@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>Edita la publicación {{ $post->id }}</h1>
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 
                'method' => 'PUT', 'autocomplete' => 'off', 'files' => true]) !!}
                {!! Field::text('title', ['label' => 'Título']) !!}
                {!! Field::textarea('content', ['label' => 'Escribe tu publicación', 'rows' => 10]) !!}
                {!! Field::file('photo',['label' => 'Foto']) !!}
                {!! Form::submit('Actualizar') !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection


