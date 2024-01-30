<?php

namespace App\Models;

use Illuminate\Http\Request;

class Information
{
    /**
     * @param $data
     * @return array
     */
    public function device($data): array
    {
        return [
            "responsible_id" => $data->responsible_id,
            "type_device_id" => $data->type_device_id,
            "state" => $data->state,
            "brand" => $data->brand,
            "model" => $data->model,
            "serial" => $data->serial,
            "operating_system" => $data->operating_system,
            "processor" => $data->processor,
            "slots" => ($data->slotsOne === null || $data->slotsTwo === null) ? null : $data->slotsOne." DE ".$data->slotsTwo,
            "ram" => $data->ram,
            "memory" => $data->memory." ".($data->ssd ?? $data->hdd),
            "labeling" => $data->labeling,
            "purchase_date" => $data->purchase_date,
            "warranty" => ($data->purchase_date === null || $data->warranty === null) ? null : date("Y-m-d",strtotime($data->purchase_date."+ ".$data->warranty." days")),
        ];
    }

    public function typeDevice($data)
    {
        return [
            "name" => strtoupper($data->name)
        ];
    }

}
