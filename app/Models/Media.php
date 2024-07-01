<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['portfolio_id', 'media_url'];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        if ($this->media_url) {
            return asset(Storage::url($this->media_url));
        }

        return '';
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
