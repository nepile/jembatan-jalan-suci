<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected $primaryKey = 'gallery_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'title',
        'banner',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->gallery_id) {
                $model->gallery_id = Str::uuid();
            }
        });
    }
}
