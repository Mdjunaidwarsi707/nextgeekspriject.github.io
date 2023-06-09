<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Slug name automatic generate
use Illuminate\Support\Str;
class ProjectDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'slug',
        'pro_title',
        'pro_description',
        'pro_client_name',
        'pro_client_mobile',
        'pro_location',
        'pro_technology',
        'pro_keywords',
        'pro_review',
        'pro_text_message',
        'pro_image',
    ];
    // Start Slug name automatic generate
    public $timestamps = false;
    protected static function boot()
    {
        parent::boot();
        static::created(function ($ProjectDetail) {
            $ProjectDetail->slug = $ProjectDetail->generateSlug($ProjectDetail->pro_title);
            $ProjectDetail->save();
        });
    }
    private function generateSlug($pro_title)
    {
        if (static::whereSlug($slug = Str::slug($pro_title))->exists()) {
            $max = static::wherepro_title($pro_title)->latest('id')->skip(1)->value('slug');
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
