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
        return view('painel.users.include');
    }
    

    public function store(Request $request)
    {
        //return [$request->name,  $request->phone,  $request->email,  $request->password,  $request->admin];
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = $request->admin == 'on' ? 1:0;
        $user->save();
        return redirect()->route('user.index')->with('message', 'Usuário criado com sucesso!');
    }
    

    public function show($id)
    {
        $value = $request->session()->get('key');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('administerUser/alter-user', ['user'=>$user]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); 
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = $request->admin; 
        $user->save();
        return redirect()->route('user.index')->with('message', 'Usuário alterado com sucesso!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('message', 'Usuário excluído com sucesso!');
    }

    // public function create()
    // {
    //     // if( Gate::denies('create_user') ) 
    //     // return redirect()->back();

    //     if(Auth::check()){
    //         $err=['err'=>[]];
    //     return view('painel.users.form', $err);
    //     }else{
    //         return redirect('painel.users.index');
    //     }
    // }
    
    

    // public function update(Request $request, $id)
    // {

    //     if( Gate::denies('edit-user') ) 
    //     return redirect()->back();

    //     $user = User::findOrFail($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = $request->passord;
    //     $success = $user->save();

    //     if($success){
    //         return redirect('/user/' . $id . '?success=true');
    //     }else{
    //         return redirect('/user/' . $id . '?success=false');
    //     }
    // }
   
    public function roles($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);
        
        //recuperar roles
        $roles = $user->roles()->get();
        
        return view('painel.users.roles', compact('user', 'roles'));
    }
    
    // public function edit($id)
    // {
    //     if( Gate::denies('edit-user') ) 
    //         return redirect()->back();
        
    //     //Show form
    // }
}