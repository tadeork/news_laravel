@extends('layouts.app')
@section('content')

    <div class="jumbotron">
        <h1>Blog de noticias de la UCR</h1>
        <p>Información para estar al tanto del partido</p>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-8">
        @foreach( $posts as $post)
        <h1><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h1>
        
            <div class="" align="center">
                <img class="img-responsive" align="center" src="{{ asset('photos/'. $post->photo) }}" alt="Photo">
            </div>
            <p>{{ $post->content }}</p>
            <br>
            <a href="{{ route('posts.show', $post->slug) }}">Ver</a>
            <hr>
        @endforeach
    </div>
@endsection