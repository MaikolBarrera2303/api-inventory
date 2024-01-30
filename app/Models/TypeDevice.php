<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeDevice extends Model
{
    use HasFactory;

    protected $table = "type_devices";

    protected $fillable = [
        "name"
    ];

    /**
     * @return HasMany
     */
    public function devices(): HasMany
    {
        return $this->hasMany(Device::class,"type_device_id");
    }

    /**
     * @return HasMany
     */
    public function licenseAssignments(): HasMany
    {
        return $this->hasMany(LicenseAssignment::class,"type_device_id");
    }

}
