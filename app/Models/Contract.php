<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /** @use HasFactory<\Database\Factories\ContractFactory> */
    use HasFactory;
    protected $fillable = [
         'typeContract',
         'document',
         'startDate',
         'endDate',
    ];

    // public function users()
    // {
    //     return $this->hasMany(Users::class);
    // }

}
