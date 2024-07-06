<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "title",
        "img_url",
        "brand",
        "type",
        "mfg",
        "life",
        "slug",
        "summary",
        "description",
        "sku",
        "price",
        "discount",
        "qty",
        "best_seller",
        "hot_product",
        "treding_product",
        "created_at",
        "updated_at"
    ];

    protected $appends = ['format_price', 'format_old_price'];

    public function getFormatPriceAttribute()
    {
        
        $formater = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
        return $formater->formatCurrency($this->price, 'VND');
    }


    public function getFormatOldPriceAttribute()
    {

        $formater = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
        return $formater->formatCurrency($this->old_price, 'VND');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function subcategory()
    {
        return $this->belongsToMany(SubCategory::class, 'product_categories');
    }

}
