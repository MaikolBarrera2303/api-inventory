<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class License extends Model
{
    use HasFactory;

    protected $table = "licenses";

    protected $fillable = [
        "company",
        "product",
        "account",
        "quantity",
        "available",
        "expiration_date",
    ];

    /**
     * @return HasMany
     */
    public function licenseAssignments(): HasMany
    {
        return $this->hasMany(LicenseAssignment::class,"license_id");
    }

}
