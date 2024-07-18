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
        return $this->belongsToMany(Menu::class, 'Order_Menu');
    }

    public function order_menu(){
        return $this->hasMany(Order_Menu::class);
    }
    
    public function full_or_half(){
        return $this->belongsTo(Order_Menu::class, 'full_or_half');
    }

    public function cook(){
        return $this->belongsTo(User::class, 'cook_id');
    }
    public function waiter(){
        return $this->belongsTo(User::class, 'waiter_id');
    }
    public function order_status(){
        return $this->belongsTo(Order_Status::class, 'status_id');
    }
}
