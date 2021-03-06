<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
    private $post;
    
    public function __construct(Post $post)//injeta o objeto
    {
        $this->post = $post;//chama ele
        
        if( Gate::denies('view_post') ) //da a permissão de visualizar
            return redirect()->back();
    }
    
    public function index()
    {
        $posts = $this->post->all();
            //abort(403, 'Não possui permissão para visualizar a lista de POSTS');
        
        return view('painel.posts.index', compact('posts'));
    }
}