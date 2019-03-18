@extends('layouts.app')

@section('content')
    <div class="container">

        @forelse ($posts as $post)
            {{-- @can('view_post', $post)      --}}
                <h1> {{$post->title}} </h1>
                <p> {{$post->description}} </p><br>
                <b> Autor: {{$post->user->name}} </b>
            @can('update_post', $post) 
                <a  href= "{{url("/post/$post->id/update")}}">Editar</a>
            @endcan 
             <hr>
                {{-- <p> teste </p> --}}
        @empty

            <p> Nenhum Post cadastrado!</p>

        @endforelse
    
    </div>
@endsection

{{-- parte original do laravel que manda para o painel--}}
<!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
             {{--    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                        --}}
                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->