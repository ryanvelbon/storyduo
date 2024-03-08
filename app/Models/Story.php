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
        'author_id',
        'language_id',
        'title',
        'title_en',
        'slug',
        'description',
        'feat_img',
        'published',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function segments()
    {
        return $this->hasMany(StorySegment::class)->orderBy('sort', 'asc');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
