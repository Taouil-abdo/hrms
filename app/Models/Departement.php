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
        'job_id',
    ];

    public function joobs()
    {
        return $this->hasMany(Joob::class);
    }
    
    public function users()
    {
        return $this->hasMany(Users::class);
    }
    
}
