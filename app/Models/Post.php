<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PublicCategoryGroup;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'locale',
        'cover',
        'summary',
        'content'
    ];

    public function category()
    {
        return $this->belongsTo(PublicCategory::class); 
    }
}
