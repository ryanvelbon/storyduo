<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_native',
        'code',
        'flag_code',
        'published',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
