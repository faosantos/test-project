<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Gate;

class UserController extends Controller
{
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
        
        if( Gate::denies('user') ) 
            return redirect()->back();
    }
    
    public function index()
    {
        $users = $this->user->all();
        
        return view('painel.users.index', compact('users'));
    }

    
    public function create()
    {
        return view('painel.users.include');
    }
    

    public function store(Request $request)
    {
        //return [$request->name,  $request->phone,  $request->email,  $request->password,  $request->admin];
        $user = new User;
        $user->name = $request->name;
        // $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->admin = $request->admin == 'on' ? 1:0;
        $user->save();
        return redirect()->route('painel.users.index')->with('message', 'Usuário criado com sucesso!');
    }
    

    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('painel.users.user', compact('user'));
    // }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('painel.users.alter-user', ['user'=>$user]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); 
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->admin = $request->admin; 
        $user->save();
        return redirect()->route('painel.users.index')->with('message', 'Usuário alterado com sucesso!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('painel.users.index')->with('message', 'Usuário excluído com sucesso!');
    }
    public function one_user($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);
              
        return view('painel.users.user', compact('user'));
    }

    public function roles($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);
        
        //recuperar roles
        $roles = $user->roles()->get();
        
        return view('painel.users.roles', compact('user', 'roles'));
    }
    
}