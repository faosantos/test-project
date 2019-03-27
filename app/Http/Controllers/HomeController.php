<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Gate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Post $post)
    //public function index()
    {
        $posts = $post->all(); //Traz todos os posts de todos os usuarios.

    //    $posts = $post->where('user_id', auth()->user()->id)->get(); //Traz os posts de cada usuarios.

        return view('home', compact('posts'));
         //return view('painel.home.index');
    }

    public function update($idPost)
    {
        $post = Post::find($idPost);

        //  $this->authorize('update-post', $post);  //esta é uma maneira

        if (Gate::denies('update-post', $post)) {
                abort(403, 'Não autorizado!');

         }
            return view('update-post', compact('post'));
           // return 'teste';
       

    }

    public function rolesPermission() //serve para testar (debugar a aplicação) em uma rota "role-permission"
    {
        $nameUser = auth()->user()->name;
          echo("<h1>{$nameUser}</h1>");

        foreach(auth()->user()->roles as $role){
            echo "<b>$role->name</b> -> ";

            $permissions = $role->permissions;
            foreach($permissions as $permission)
            {
                echo "$permission->name, ";
            }

            echo '<hr>';
        }
    } 
}
