<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description',  'category_id', 'image_url'];
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        if ($this->image_url) {
            return asset(Storage::url($this->image_url));
        }

        return '';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
