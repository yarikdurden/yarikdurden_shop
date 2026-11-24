<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // У категории много товаров
    public function products() {
        return $this->hasMany(Product::class);
    }
}