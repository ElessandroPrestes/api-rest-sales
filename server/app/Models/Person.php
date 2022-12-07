<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    use HasFactory;
    
    protected $table = "persons";

    public $timestamps = false;

    protected $fillable = ['name', 'cpf', 'cep', 'public_area', 'number', 'district', 'complement', 'city', 'birth_date'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

}
