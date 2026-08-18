<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Surah extends Model
{
    use HasTranslations;

    protected $fillable = ['number', 'name', 'revelation_type', 'number_of_ayahs'];
    
    public $translatable = ['name'];

    public function ayahs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ayah::class);
    }
}
