<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $table = "news";
    protected $guarded = [];

    public function tags():HasMany
    {
        return $this->hasMany(TagsNews::class);
    }
}
