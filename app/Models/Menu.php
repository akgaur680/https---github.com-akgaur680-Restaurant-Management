<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = [
        'item_name',
        'full_item_price',
        'half_item_price',
        ];

        public function order()
        {
            return $this->belongsToMany(Order::class, 'Order_Menu');
        }

}
