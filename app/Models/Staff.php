<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'full_name',
        'phone_number',
        'role_id'
    ];

    public function user(): MorphOne {
        return $this->morphOne(User::class, 'profile');
    }

    protected static function booted() {
        static::creating(function(Staff $staff) {
           do {
               $staff->code = 'NV' . fake()->randomNumber(5, false);
           } while ($staff->where('code', $staff->code)->exists());
        });
    }
}
