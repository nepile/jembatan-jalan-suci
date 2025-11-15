<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Donation extends Model
{
    protected $primaryKey = 'donation_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'order_id',
        'full_name',
        'honorary_call',
        'email',
        'phone_number',
        'hope',
        'bank',
        'va_number',
        'expiry_time',
        'amount',
        'status',
        'program_id'
    ];

    protected $casts = [
        'amount' => 'integer',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(DonationProgram::class, 'program_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->donation_id) {
                $model->donation_id = Str::uuid();
            }
        });
    }
}
