<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Hadith extends Model
{
    use HasTranslations;
    protected $fillable = ['hadith_category_id', 'text', 'narrator', 'source', 'grade'];
    public $translatable = ['text', 'narrator'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HadithCategory::class, 'hadith_category_id');
    }
}
