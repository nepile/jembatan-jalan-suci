<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DonationProgram extends Model
{
    protected $primaryKey = 'program_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'banner',
        'title',
        'description',
        'deadline',
        'target',
    ];

    public function donation(): HasMany 
    {
        return $this->hasMany(Donation::class, 'donation_id');
    }
}
