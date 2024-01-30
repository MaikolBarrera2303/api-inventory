<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LicenseAssignment extends Model
{
    use HasFactory;

    protected $table = "license_assignments";

    protected $fillable = [
        "license_id",
        "responsible_id",
        "device_id",
        "type_device_id",
    ];

    /**
     * @return BelongsTo
     */
    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class,"license_id");
    }

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
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class,"device_id");
    }

    /**
     * @return BelongsTo
     */
    public function typeDevice(): BelongsTo
    {
        return $this->belongsTo(TypeDevice::class,"type_device_id");
    }

}
