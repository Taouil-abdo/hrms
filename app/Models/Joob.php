<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joob extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory ;

    protected $fillable = ['title', 'description'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
