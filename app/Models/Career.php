<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    /** @use HasFactory<\Database\Factories\PromotionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recruitment_date',
        'salary',
        'departement',
        'role',
        'contract',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
