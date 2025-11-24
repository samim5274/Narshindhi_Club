<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'membership_type',
        'point',
        'start_date',
        'expiry_date',
        'is_active',
        'remarks',
    ];

    /**
     * Check if membership is active
     */
    public function isActive(): bool
    {
        return $this->is_active && $this->expiry_date >= now()->format('Y-m-d');
    }
}
