<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Slug name automatic generate
use Illuminate\Support\Str;
class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'bg_title',
        'slug',
        'bg_content',
        'bg_image',
    ];

    // Start Slug name automatic generate
    public $timestamps = false;
    protected static function boot()
    {
        parent::boot();
        static::created(function ($Blog) {
            $Blog->slug = $Blog->generateSlug($Blog->bg_title);
            $Blog->save();
        });
    }
    private function generateSlug($bg_title)
    {
        if (static::whereSlug($slug = Str::slug($bg_title))->exists()) {
            $max = static::wherebg_title($bg_title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-1";
        }
        return $slug;
    }
    // End Slug name automatic generate
}
