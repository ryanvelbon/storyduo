<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'title_en',
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
