<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPost;
use App\Http\Requests\UsuarioPost;
use App\Models\Usuario;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginPost $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('perfil');
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales no son correctas',
            ])->onlyInput('email');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function perfil()
    {
        $usuario = Auth::user(); // Ya viene autenticado
        return view('usuarios.perfil', compact('usuario'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('listar-usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioPost $request)
    {
        $archivoPath = null;
        // Si se sube un avatar, guardarlo en el servidor
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('avatars', 'public');
            // dd($archivoPath);
            // $archivo = $request->file('archivo');
            // dump($archivo->getRealPath());
            // dump(\Illuminate\Support\Facades\Storage::path($archivoPath));
        }
        Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'nick' => $request->nick,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'karma' => 0,
            'avatar' => $archivoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        return redirect()->route('usuarios.index')->with('info', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('usuarios.edit', ['usuario' => Usuario::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioPost $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $archivoPath = null;
        // Si se sube un avatar, guardarlo en el servidor
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('avatars', 'public');
            // dd($archivoPath);
            // $archivo = $request->file('archivo');
            // dump($archivo->getRealPath());
            // dump(\Illuminate\Support\Facades\Storage::path($archivoPath));
        }

        $usuario->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'nick' => $request->nick,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $usuario->password,
            'karma' => $request->karma,
            'avatar' => $request->hasFile('archivo') ? $archivoPath : $usuario->avatar,
            'updated_at' => now(),
        ]);

        return redirect()->route('usuarios.index')->with('info', 'Usuario actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('info', 'Usuario eliminado correctamente');
    }
}
