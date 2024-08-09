<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'company_id',
        'name',
        'description',
        'price',
        'barcode',
        'weight',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
