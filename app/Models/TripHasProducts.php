<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripHasProducts extends Model
{
    use HasFactory;

    protected $table = 'trips_has_poducts';

    protected $fillable = [
        'trip_id',
        'product_id',
        'start_quantity',
        'end_quantity',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
