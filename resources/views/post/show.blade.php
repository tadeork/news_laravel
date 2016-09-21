@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $post->title}}</h1>
            <p>{{ $post->content }}</p>
            <img class="img-responsive" src="{{ asset('photos/'. $post->photo) }}" alt="Photo">
            <br>
             <a href="{{ route('posts.index') }}">Volver</a>
             @if(Auth::check())
                @if(Auth::user()->admin == true)
                <br>
                <a class="btn btn-warning btn-xs" href="{{ route('posts.edit', $post->id) }}">Editar</a>
                    {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
             @endif
        </div>
    </div>
@endsection