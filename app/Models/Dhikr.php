<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Dhikr extends Model
{
    use HasTranslations;
    protected $fillable = ['adhkar_category_id', 'text', 'translation', 'count'];
    public $translatable = ['text', 'translation'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AdhkarCategory::class, 'adhkar_category_id');
    }
}
