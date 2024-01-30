<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    use HasFactory;

    protected $table = "devices";

    protected $fillable = [
        "responsible_id",
        "type_device_id",
        "state",
        "brand",
        "model",
        "serial",
        "operating_system",
        "processor",
        "slots",
        "ram",
        "memory",
        "labeling",
        "purchase_date",
        "warranty",
    ];

    /**
     * @return BelongsTo
     */
    public function responsible(): BelongsTo
    {
        return $this->belongsTo(Responsible::class,"responsible_id");
    }

    /**
     * @return BelongsTo
     */
    public function typeDevice(): BelongsTo
    {
        return $this->belongsTo(TypeDevice::class,"type_device_id");
    }

    /**
     * @return HasMany
     */
    public function accessories(): HasMany
    {
        return $this->hasMany(Accessory::class,"device_id");
    }

    /**
     * @return HasMany
     */
    public function additionalObservations(): HasMany
    {
        return $this->hasMany(AdditionalObservation::class,"device_id");
    }

    /**
     * @return HasMany
     */
    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class,"device_id");
    }

    /**
     * @return HasMany
     */
    public function licenseAssignments(): HasMany
    {
        return $this->hasMany(LicenseAssignment::class,"device_id");
    }

}
