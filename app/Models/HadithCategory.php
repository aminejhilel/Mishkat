<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class HadithCategory extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'slug'];
    public $translatable = ['name'];

    public function hadiths(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Hadith::class);
    }
}
