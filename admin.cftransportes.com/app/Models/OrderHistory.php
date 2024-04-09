<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'creator_id',
        'comment',
        'status',
    ];

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }

    public function creator() 
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    
}
