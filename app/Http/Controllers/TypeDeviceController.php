<?php

namespace App\Http\Controllers;

use App\Data\Refactor;
use App\Models\Information;
use App\Models\TypeDevice;
use Illuminate\Support\Facades\Log;
use Throwable;

class TypeDeviceController extends Controller
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
                "data" => TypeDevice::paginate(10)
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR TYPE-DEVICE INDEX : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Cargando Tipo de Dispositivos",
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
            $data = (new Refactor)->typeDevices(request("data"));
            TypeDevice::create((new Information)->typeDevice($data));
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Tipo de Dispositivo Creado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR TYPE-DEVICE STORE : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Creando Tipo de Dispositivo",
                "type" => "error"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeDevice $typeDevice)
    {
        try
        {
            $typeDevice->delete();
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Tipo de Dispositivo Eliminado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR DEVICE DESTROY : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Elimiando Tipo de Dispositivo",
                "type" => "error"
            ]);
        }
    }
}
