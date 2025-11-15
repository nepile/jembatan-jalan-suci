<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
        'slug',
        'status',
    ];

    public function donation(): HasMany
    {
        return $this->hasMany(Donation::class, 'program_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->program_id) {
                $model->program_id = Str::uuid();
            }
        });
    }
}
