<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventoPost;
use App\Models\Especie;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::with(['participantes', 'anfitrion'])->get();
        return view('listar-eventos', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especies = Especie::all();	
        $usuarios = Usuario::all();
        return view('eventos.create', compact('especies', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoPost $request)
    {
        $archivoPath = null;

        // Si se sube un avatar, guardarlo en el servidor
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('archivos', 'public');
            // dd($archivoPath);
            // $archivo = $request->file('archivo');
            // dump($archivo->getRealPath());
            // dump(\Illuminate\Support\Facades\Storage::path($archivoPath));
        }

        $evento = Evento::create([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
            'tipo_evento' => $request->tipo_evento,
            'tipo_terreno' => $request->tipo_terreno,
            'descripcion' => $request->descripcion,
            'anfitrion_id' => $request->anfitrion_id,
            'archivo' => $archivoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        if ($request->has('participantes')) {
            $evento->participantes()->attach($request->participantes);
        }

        foreach ($request->especies as $id => $cantidad) {
            if ($cantidad > 0) {
                $evento->especies()->attach($id, ['cantidad' => $cantidad]);
            }
        }

        return redirect()->route('eventos.index')->with('info', 'Evento creado correctamente');
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
        $evento = Evento::findOrFail($id);
        $especies = Especie::all();	
        $usuarios = Usuario::all();
        $usuariosParticipantes = $evento->participantes;
        $usuariosDisponibles = Usuario::whereNotIn('id', $usuariosParticipantes->pluck('id'))->get(); 
        return view('eventos.edit', compact('evento', 'especies', 'usuarios' , 'usuariosDisponibles', 'usuariosParticipantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoPost $request, string $id)
    {
        $evento = Evento::findOrFail($id);
        $archivoPath = null;
        // Si se sube un avatar, guardarlo en el servidor
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('archivos', 'public');
            // dd($archivoPath);
            // $archivo = $request->file('archivo');
            // dump($archivo->getRealPath());
            // dump(\Illuminate\Support\Facades\Storage::path($archivoPath));
        }

        $evento->update([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
            'tipo_evento' => $request->tipo_evento,
            'tipo_terreno' => $request->tipo_terreno,
            'descripcion' => $request->descripcion,
            'anfitrion_id' => $request->anfitrion_id,
            'archivo' => $request->hasFile('archivo') ? $archivoPath : $evento->archivo,
            'updated_at' => now(),
        ]);
        
        $evento->participantes()->detach($request->participantes_existentes);
        $evento->participantes()->attach($request->nuevos_participantes);
        
        $especiesSync = [];

        foreach ($request->especies as $id => $cantidad) {
            if ($cantidad > 0) {
                $especiesSync[$id] = ['cantidad' => $cantidad];
            }
        }

        $evento->especies()->sync($especiesSync);


        return redirect()->route('eventos.index')->with('info', 'Evento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);
        
        $evento->especies()->detach();
        $evento->participantes()->detach();
        
        $evento->delete();
        
        return redirect()->route('eventos.index')->with('info', 'Evento eliminado correctamente');
        }
}
