<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Obtener todos los vehículos
    public function index()
    {
        return Vehiculo::all();
    }

    // Guardar un nuevo vehículo
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:25',
            'modelo' => 'required|string|max:25',
            'year' => 'required|integer',
            'num_motor' => 'required|string|max:25',
            'num_chasis' => 'required|string|max:25',
        ]);

        Vehiculo::create($request->all());

        return response()->json(['message' => 'Vehículo guardado correctamente']);
    }

    // Eliminar vehículo por ID
    public function destroy($id)
    {
        Vehiculo::destroy($id);
        return response()->json(['message' => 'Vehículo eliminado']);
    }
}
