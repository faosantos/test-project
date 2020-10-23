@extends('painel.templates.template')

@section('content')

<!--Filters and actions-->
<div class="actions">
    <div class="container" style="display:flex; justify-content: space-around;">
        
        <a class="add" href="include">
            <i class="fa fa-plus-circle"></i>
        </a>

        <form class="form-search form form-inline">
                    @csrf
            <input type="text" name="pesquisar" placeholder="Buscar por..." class="form-control">
            {{-- <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success"> --}}
            <button type="submit" class="btn btn-success">Pesquisar</button>
        </form>
    </div>
</div><!--Actions-->

<div class="clear"></div>

<div class="container">
    <h1 class="title">
        Lista de Usuários
    </h1>

    <table class="table table-hover">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th width="150px">Ações</th>
        </tr>

        @forelse( $users as $user )
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
               <!--  <a href="{{url("/painel/users/$user->id/user")}}" class="permission">
                    <i class="fa fa-unlock"></i>
                </a> -->
                <a href="{{url("/painel/users/$user->id/roles")}}" class="permission">
                    <i class="fa fa-unlock"></i>
                </a>
                <a href="{{url("/painel/users/$user->id/alter-user")}}" class="edit">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href="{{url("/painel/users/$user->id/delete")}}" class="delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
            <td>
                <a href="{{url("/painel/users/$user->id/user")}}" class="permission">
                    <span>Visualizar perfil</span>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="90">
                <p>Nenhum Resultado!</p>
            </td>
        </tr>
        @endforelse
    </table>

</div>

@endsection