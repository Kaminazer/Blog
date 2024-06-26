<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\SoftDeletes;

class TagsNews extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "tags_news";

    public function new():BelongsTo
    {
        return $this->belongsTo(News::class,"news_id","id");
    }
}
