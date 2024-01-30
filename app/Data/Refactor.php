<?php

namespace App\Data;

class Refactor
{
    /**
     * @param $data
     * @return object
     */
    public function devices($data): object
    {
        return  (object) [
            "responsible_id" => $data["responsible_id"] ?? null,
            "type_device_id" => $data["type_device_id"] ?? null,
            "state" => $data["state"] ?? null,
            "brand" => $data["brand"] ?? null,
            "model" => $data["model"] ?? null,
            "serial" => $data["serial"] ?? null,
            "operating_system" => $data["operating_system"] ?? null,
            "processor" => $data["processor"] ?? null,
            "slotsOne" => $data["slotsOne"] ?? null,
            "slotsTwo" => $data["slotsTwo"] ?? null,
            "ram" => $data["ram"] ?? null,
            "memory" => $data["memory"] ?? null,
            "ssd" => $data["ssd"] ?? null,
            "hdd" => $data["hdd"] ?? null,
            "labeling" => $data["labeling"] ?? null,
            "purchase_date" => $data["purchase_date"] ?? null,
            "warranty" => $data["warranty"] ?? null
        ];
    }

    public function typeDevices($data)
    {
        return (object) [
            "name" => $data["name"] ?? null
        ];
    }


}
