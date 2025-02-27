<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    /** @use HasFactory<\Database\Factories\DepartementFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',

    ];
    
    // public function users()
    // {
    //     return $this->hasMany(Users::class);
    // }
    
}
