<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Responsible extends Model
{
    use HasFactory;

    protected $table = "responsible";

    protected $fillable = [
        "name",
        "phone",
        "account",
    ];

    /**
     * @return HasMany
     */
    public function devices(): HasMany
    {
        return $this->hasMany(Device::class,"responsible_id");
    }

    /**
     * @return HasMany
     */
    public function responsibleReports(): HasMany
    {
        return $this->hasMany(Repair::class,"responsible_report_id");
    }

    /**
     * @return HasMany
     */
    public function licenseAssignments(): HasMany
    {
     return $this->hasMany(LicenseAssignment::class,"responsible_id");
    }

}
