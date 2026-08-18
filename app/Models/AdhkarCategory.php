<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class AdhkarCategory extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'icon'];
    public $translatable = ['name'];

    public function dhikrs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Dhikr::class);
    }
}
