<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id',
        'employee_id',
        'is_active',
        'status',
        'created_at',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Customer::class, 'employee_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'order_id', 'id');
    }

}
