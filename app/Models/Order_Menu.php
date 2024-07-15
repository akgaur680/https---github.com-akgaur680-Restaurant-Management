<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Menu extends Model
{
    use HasFactory;

    protected $table = 'order_menu';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'menu_id',
        'qty',
    ];
}

