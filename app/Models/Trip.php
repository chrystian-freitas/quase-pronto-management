<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'created_by',
        'trip_made_by',
        'route_id',
        'start_date',
        'start_total_load',
        'start_km',
        'end_km',
        'end_total_load',
        'end_date',
        'value_paid_by_employee',
        'final_balance',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tripMadeBy()
    {
        return $this->belongsTo(User::class, 'trip_made_by');
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'trips_has_poducts')
            ->withPivot('start_quantity', 'end_quantity');
    }
}
