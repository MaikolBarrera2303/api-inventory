<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdditionalObservation extends Model
{
    use HasFactory;

    protected $table = "additional_observations";

    protected $fillable = [
        "device_id",
        "date",
        "observation",
    ];

    /**
     * @return BelongsTo
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class,"device_id");
    }

}
