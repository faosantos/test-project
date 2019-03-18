
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> {{$post->title}} </h1>
        <p> {{$post->description}} </p><br>
        <b> Autor: {{$post->user->name}} </b>
    </div>
@endsection