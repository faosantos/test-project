<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        if( Gate::denies('create_user') ) 
        return redirect()->back();

        $err=['err'=>[]];
        return view('painel.users.form', $err);
    }
    
    public function store(Request $request)
    {
        if( Gate::denies('create_user') ) 
        return redirect()->back();//não esquecer de dar a permissão para criar o usuario
        $valid = [
            'name'=> 'required|string',
            'email'=>'required|unique:users',
            'password' => 'required|same:confirm-password',
        ];
        $messages = [
            'required' => 'preencha o campo :attribute',
            'email.unique' => 'Email já utilizado'
        ];
        $validator = Validator::make($request->all(), $valid, $messages);
        if ($validator->fails()) {
            $err = ['err' => $validator->errors()->toArray()];
            return view('painel.users.form', $err);
        }
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ];
        $user = User::create($user);
        if($user){
            return redirect('/?success=true');
        }else{
            return redirect('/user/add?success=false&msg=Algo deu errado, confirme os campos e tente novamente');
        }
    }

    public function show($id)
    {
        //não esquecer de dar a permissão para mostrar o usuario
        $user = User::findOrFail($id);
        return view('painel.users.view', ['user'=> $user]);
    }

    public function update(Request $request, $id)
    {

        if( Gate::denies('edit-user') ) 
        return redirect()->back();

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->passord;
        $success = $user->save();

        if($success){
            return redirect('/client/' . $id . '?success=true');
        }else{
            return redirect('/client/' . $id . '?success=false');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $confirm = $user->delete();
        if($confirm)
            return redirect('/?success=2');
        else
            return redirect('/?success=false');
    }
    
    public function roles($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);
        
        //recuperar roles
        $roles = $user->roles()->get();
        
        return view('painel.users.roles', compact('user', 'roles'));
    }
    
    public function edit($id)
    {
        if( Gate::denies('edit-user') ) 
            return redirect()->back();
        
        //Show form
    }
}