<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    /** @use HasFactory<\Database\Factories\CongerFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        // 'Days',
        'type',
        'manager_approval',
        'hr_approval'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
}
