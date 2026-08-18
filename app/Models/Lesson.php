<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Lesson extends Model
{
    use HasTranslations;
    protected $fillable = ['lesson_category_id', 'author_id', 'title', 'content', 'audio_url', 'video_url', 'thumbnail', 'is_published'];
    public $translatable = ['title', 'content'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LessonCategory::class, 'lesson_category_id');
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
