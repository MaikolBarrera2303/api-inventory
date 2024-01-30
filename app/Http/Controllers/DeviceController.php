<?php

namespace App\Http\Controllers;

use App\Data\Refactor;
use App\Models\Device;
use App\Models\Information;
use App\Models\Responsible;
use App\Models\TypeDevice;
use Throwable;
use Illuminate\Support\Facades\Log;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            if (request()->exists("create"))
            {
                return response()->json([
                    "code" => 200,
                    "data" => [
                        "responsibles" => Responsible::orderBy('id')->get(['id','name']),
                        "typeDevices" => TypeDevice::all()
                    ]
                ]);
            }
            return response()->json([
                "code" => 200,
                "data" => Device::with(["responsible","typeDevice"])->paginate(10)
            ]);

        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR DEVICE INDEX : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Mostrando Dispositivos",
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
        $data = (new Refactor())->devices(request("data"));
        Device::create((new Information())->device($data));
        return response()->json([
            "code" => 200,
            "type" => "success",
            "message" => "Dispositivo Creado",
        ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR DEVICE STORE : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Creando Dispositivo",
                "type" => "error"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        try
        {
            if(request()->exists("edit"))
            {
                return response()->json([
                    "code" => 200,
                    "data" => [
                        "info" => $device->load(["responsible","typeDevice"]),
                        "query" => [
                            "responsibles" => Responsible::orderBy('id')->get(['id', 'name']),
                            "typeDevices" => TypeDevice::all()
                        ]
                    ]
                ]);
            }
            return response()->json([
                "code" => 200,
                "data" => $device->load(["responsible","typeDevice"])
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR DEVICE SHOW : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Mostrando Dispositivo",
                "type" => "error"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Device $device)
    {
        try
        {
            $data = (new Refactor())->devices(request("data"));
            $device->update((new Information())->device($data));
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Dispositivo Actualizado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR DEVICE UPDATE : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Actualizando Dispositivo",
                "type" => "error"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        try
        {
            $device->delete();
            return response()->json([
                "code" => 200,
                "type" => "success",
                "message" => "Dispositivo Eliminado",
            ]);
        }
        catch(Throwable $throwable)
        {
            Log::channel("error_inventory")->error("ERROR DEVICE DESTROY : ".json_encode($throwable->getMessage()));
            return response()->json([
                "code" => 400,
                "message" => "Error Elimiando Dispositivo",
                "type" => "error"
            ]);
        }
    }

}