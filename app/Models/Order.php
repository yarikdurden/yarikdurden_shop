<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'customer_name', 'order_date', 'total_amount', 'status'];

    // Связь: заказ принадлежит пользователю (может быть null, если оформлен гостем)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь: в заказе много позиций
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}