<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author_id',
        'feat_img',
        'published',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function segments()
    {
        return $this->hasMany(StorySegment::class);
    }
}
