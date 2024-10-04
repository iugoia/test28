<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car_brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }
}
