<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    use HasFactory;
    
    protected $table = 'sales';

    public $timestamps = true;

    protected $fillable = ['id_client', 'id_products', 'date_sales', 'total'];

    public function persons()
    {
        $this->belongsTo(Person::class);
    }

    public function products()
    {
        return $this->hasOne(Products::class);
    }
}
