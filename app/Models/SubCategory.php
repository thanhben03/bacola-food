<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class SubCategory extends Model
{
    use HasFactory, HasSlug;
    protected $table = 'sub_categories';
    protected $fillable = [
        'title','slug','category_id'
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function shouldSlugify()
    {
        // Tạo lại slug nếu trường title được cập nhật
        return $this->isDirty('title');
    }
}
