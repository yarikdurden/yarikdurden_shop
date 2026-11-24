<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'composition', 'price', 'image_path'];

    // Товар принадлежит категории
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // У товара много размеров (вариаций)
    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }
}