<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Gate;

class RoleController extends Controller
{
    private $role;
    
    public function __construct(Role $role)//injeta o objeto
    {
        $this->role = $role;//chama ele
        
        if( Gate::denies('view_post') )//da a permissão de visualizar 
            return redirect()->back();
    }
    
    public function index()
    {
        $roles = $this->role->all();
        
        return view('painel.roles.index', compact('roles'));
    }
    
    public function permissions($id)
    {
        //Recupera o role
        $role = $this->role->find($id);
        
        //recuperar permissĂµes
        $permissions = $role->permissions()->get();
        
        return view('painel.roles.permissions', compact('role', 'permissions'));
    }
}