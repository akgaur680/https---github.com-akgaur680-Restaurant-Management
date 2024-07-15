<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable =[
        'customer_name',
        'order_total_price',
        'cook_id',
        'waiter_id',

    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'order-menu')->withPivot('qty')->withTimestamps();
    }
}
