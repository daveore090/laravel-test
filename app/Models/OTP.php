<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OTP extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'otp', 'type', 'verified_at', 'expires_at'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function isExpired():bool
    {
        return $this->expires_at->isPast();
    }
}
