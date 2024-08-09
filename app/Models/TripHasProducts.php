<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripHasProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trips_has_poducts';

    protected $fillable = [
        'uuid',
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
