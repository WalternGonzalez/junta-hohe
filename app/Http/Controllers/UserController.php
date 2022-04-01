<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct() 
    {
        
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');

    }


    
    public function index(Request $request)
    {

     /*  $busqueda = $request->input('busqueda');

        $users = User::query()
                      ->where('name', 'LIKE', "%{$busqueda}%")
                      ->orWhere('email', 'LIKE', "%{$busqueda}%")
                      ->get();*/

        return view('users.index');
    }


    
   
    public function edit(User $user)
    {
        $roles =Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

  


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit', $user)->with('info', 'Se asignó los roles correctamente');
    }


}
