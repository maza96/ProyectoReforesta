<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspeciesPost;
use App\Models\Especie;
use App\Models\Evento;
use DB;
use Illuminate\Http\Request;


class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especies = Especie::with(['eventos'])->get();
        $beneficios = DB::table('beneficios')
            ->join('especies', 'beneficios.especie_id', '=', 'especies.id')
            ->select('beneficios.*', 'especies.nombre_cientifico')
            ->get();
        return view('listar-especies', compact('especies', 'beneficios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $beneficios = DB::table('beneficios')
        ->select('beneficio_id', 'descripcion')
        ->distinct()
        ->get();
        return view('especies.create', compact('beneficios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspeciesPost $request)
    {
        $archivoPath = null;
        // Si se sube un avatar, guardarlo en el servidor
        if ($request->hasFile('imagen')) {
            $archivoPath = $request->file('imagen')->store('archivos', 'public');
        }
        $especie = Especie::create([
            'nombre_cientifico' => $request->nombre_cientifico,
            'descripcion' => $request->descripcion,
            'clima' => $request->clima,
            'region' => $request->region,
            'tiempo_adulto' => $request->tiempo_adulto,
            'enlace' => $request->enlace,
            'foto' => $archivoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Guardar los beneficios relacionados
        if ($request->has('beneficios')) {
            foreach ($request->beneficios as $beneficio_id) {
                $descripcion = DB::table('beneficios')
                    ->where('beneficio_id', $beneficio_id)
                    ->value('descripcion');

                DB::table('beneficios')->insert([
                    'especie_id' => $especie->id,
                    'beneficio_id' => $beneficio_id,
                    'descripcion' => $descripcion
                ]);
            }    
        }

        return redirect()->route('especies.index')->with('success', 'Especie creada exitosamente.');
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
        $especie = Especie::findOrFail($id);

        // Obtener beneficios asociados como colección
        $beneficiosAsociados = DB::table('beneficios')
            ->where('especie_id', $id)
            ->get();

        // Obtener beneficios no asociados como colección
        $beneficiosNoAsociados = DB::table('beneficios')
            ->whereNotIn('beneficio_id', $beneficiosAsociados->pluck('beneficio_id'))
            ->select('beneficio_id', 'descripcion')
            ->distinct()
            ->get();

        return view('especies.edit', compact('especie', 'beneficiosAsociados', 'beneficiosNoAsociados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EspeciesPost $request, string $id)
    {
        $especie = Especie::findOrFail($id);
        $archivoPath = $especie->foto;

        // Si se sube una nueva imagen, guardarla en el servidor
        if ($request->hasFile('imagen')) {
            $archivoPath = $request->file('imagen')->store('archivos', 'public');
        }

        // Actualizar los datos de la especie
        $especie->update([
            'nombre_cientifico' => $request->nombre_cientifico,
            'descripcion' => $request->descripcion,
            'clima' => $request->clima,
            'region' => $request->region,
            'tiempo_adulto' => $request->tiempo_adulto,
            'enlace' => $request->enlace,
            'foto' => $archivoPath,
            'updated_at' => now(),
        ]);

        // Eliminar los beneficios seleccionados en beneficios_asociados[]
        if ($request->has('beneficios_asociados')) {
            DB::table('beneficios')
                ->where('especie_id', $id)
                ->whereIn('beneficio_id', $request->beneficios_asociados)
                ->delete();
        }

        // Añadir los beneficios seleccionados en beneficios_no_asociados[]
        if ($request->has('beneficios_no_asociados')) {
            foreach ($request->beneficios_no_asociados as $beneficio_id) {
                $descripcion = DB::table('beneficios')
                    ->where('beneficio_id', $beneficio_id)
                    ->value('descripcion');

                DB::table('beneficios')->insert([
                    'especie_id' => $id,
                    'beneficio_id' => $beneficio_id,
                    'descripcion' => $descripcion,
                ]);
            }
        }

        return redirect()->route('especies.index')->with('success', 'Especie actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $especie = Especie::findOrFail($id);

        // Eliminar las filas relacionadas en la tabla beneficios
        DB::table('beneficios')->where('especie_id', $id)->delete();

        // Eliminar la especie
        $especie->delete();

        return redirect()->route('especies.index')->with('success', 'Especie eliminada exitosamente.');
    }
}
