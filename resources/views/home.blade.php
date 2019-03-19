@extends('layouts.app')

@section('content')
    <div class="container">

        @forelse ($posts as $post)
            {{-- @can('view_post', $post)      --}}
                <h1> {{$post->title}} </h1>
                <p> {{$post->description}} </p><br>
                <b> Autor: {{$post->user->name}} </b>
            {{-- @can('update_post', $post)  --}}
                <a  href= "{{url("/post/$post->id/update")}}">Editar</a>
            {{-- @endcan  --}}
             <hr>
                {{-- <p> teste </p> --}}
        @empty

            <p> Nenhum Post cadastrado!</p>

        @endforelse
    
    </div>
@endsection

