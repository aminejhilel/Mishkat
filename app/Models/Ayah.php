<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ayah extends Model
{
    use HasTranslations;

    protected $fillable = ['surah_id', 'number_in_surah', 'text', 'audio_url'];
    
    public $translatable = ['text'];

    public function surah(): BelongsTo
    {
        return $this->belongsTo(Surah::class);
    }
}
