<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'image',
        'phone',
        'grade',
        'birthday',
        'address',
        'recruitment_date',
        'salary',
        'status',
        'leaveBalance',
        'department_id',
        'role_id',
        'contract_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function Conges()
    {
    return $this->hasMany(Conge::class);
    }

    public function recoveryDays()
    {
        return $this->hasMany(RecoveryDay::class);
    }


    // protected static function booted()
    // {
    //     static::creating(function ($user) {
    //         if ($user->password) {
    //             $user->password = bcrypt($user->password);
    //         }
    //     });
    // }
    
}