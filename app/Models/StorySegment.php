<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorySegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'sort',
        'text_lan1',
        'text_lan2',
        'img',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
