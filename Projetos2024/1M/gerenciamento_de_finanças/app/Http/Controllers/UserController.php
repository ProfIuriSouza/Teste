<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return $usuarios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = request()->input('email');
        $job = request()->input('job');
        $password = request()->input('password');
        $user = User::where('email', $email)->first();
        if($user){
            if($user->password == $password){
                return response(
                    ['location' => route('users.show', $user->id),'userid' => $user->id],
                    201
                );
            } else {
                return response(
                    ['error' => 'senha inválida'],
                    500
                );
            }
        } else {
            $p = User::create(['name' => $name, 'email' => $email, 'job' => $job, 'password' => $password]);
            $id = $p->id;
            return response(
                ['location' => route('users.show', $id),'userid' => $id],
                201
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        $usuario = User::find($id);
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $usuario = User::find($id);
        $name = request()->input('name');
        if ($name)
            $usuario->name = $name;
        $email = request()->input('email');
        if ($email)
            $usuario->email = $email;
        $job = request()->input('job');
        if ($job)
            $usuario->job = $job;
        $password = request()->input('password');
        if ($password)
            $usuario->password = $password;
        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
    }
}
