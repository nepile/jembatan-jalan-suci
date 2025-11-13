<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'amount',
        'status',
        'program_id'
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(DonationProgram::class, 'program_id');
    }
}
