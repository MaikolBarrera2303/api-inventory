<?php

namespace App\Http\Controllers;

use App\Data\Refactor;
use App\Models\Information;
use App\Models\Responsible;
use Illuminate\Support\Facades\Log;
use Throwable;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            return response()->json([
                "code" => 200,
                "data" => Responsible::paginate(10)
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR RESPONSIBLE INDEX : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Cargando Responsables",
                "type" => "error"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        try
        {
            $data = (new Refactor())->responsibles(request("data"));
            Responsible::create((new Information())->responsible($data));
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Responsable Creado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR RESPONSIBLE STORE : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Creando Responsable",
                "type" => "error"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Responsible $responsible)
    {
        try
        {
            $data = (new Refactor())->responsibles(request("data"));
            $responsible->update((new Information())->responsible($data));
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Responsable Actualizado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR RESPONSIBLE UPDATE : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Actualizando Responsable",
                "type" => "error"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsible $responsible)
    {
        try
        {
            $responsible->delete();
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Responsable Eliminado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR RESPONSIBLE DESTROY : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Elimiando Responsable",
                "type" => "error"
            ]);
        }
    }
}
