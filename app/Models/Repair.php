<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repair extends Model
{
    use HasFactory;

    protected $table = "repairs";

    protected $fillable = [
        "responsible_report_id",
        "device_id",
        "date_report",
        "observation_report",
        "responsible_diagnosis",
        "type_repair",
        "date_diagnosis",
        "diagnosis",
        "date_repair",
        "observation_repair",
    ];

    /**
     * @return BelongsTo
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class,"device_id");
    }

    /**
     * @return BelongsTo
     */
    public function responsibleReport(): BelongsTo
    {
        return $this->belongsTo(Responsible::class,"responsible_report_id");
    }

}
