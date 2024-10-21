<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PublicCategoryGroup;

class PublicCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function publicCategoryGroup()
    {
        return $this->belongsTo(PublicCategoryGroup::class); 
    }
}
