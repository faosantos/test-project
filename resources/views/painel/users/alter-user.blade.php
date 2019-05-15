@extends('painel.templates.template')

@section('content')

<!--Filters and actions-->
<div class="actions">
    <div class="container">
        <a class="add" href="forms">
            <i class="fa fa-plus-circle"></i>
        </a>

        <form class="form-search form form-inline">
            <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
            <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
        </form>
    </div>
</div><!--Actions-->

<html lang="pt-br">
   
<body>       
        <div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center">              
                        <h1><b>Usuário</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="">Panel</a></li>                  
                            <li><a href="{{route('user.index')}}">Usuário</a></li>                  
                            <li class="active">Alteração</li>
                        </ol>              
                    </div>          
                </div>
                <div class="row">  
                    <br>
                    <h4 id="center"><b>ALTERAR USUÁRIO</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('user.update', $user->id)}}" 
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" 
                                       class="form-control" 
                                       value="{{$user->name}}"
                                       required>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" 
                                       class="form-control" 
                                       value="{{$user->phone}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" 
                                       class="form-control" 
                                       value="{{$user->email}}"
                                       required>
                            </div>    
                        </div>                 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="text" name="password" 
                                       class="form-control" 
                                       value="{{$user->password}}"
                                       required>
                            </div>    
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin">Administrador</label>
                                <input type="checkbox" name="admin" 
                                       class="form-control" 
                                       value="{{$user->admin}}"
                                       required>
                            </div>    
                        </div>                         
                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Alterar
                            </button>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
        <!-- Favicon -->
<link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">

<!-- Fonts -->        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

<!-- Styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />       

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{URL::asset('js/ajax.js')}}"></script>

{{-- <script>
    function readURL(input) {
        $('#avatar_preview').show();
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $("#rider_avatar").change(function() {
        readURL(this);
    });
</script> --}}

</body>

@endsection