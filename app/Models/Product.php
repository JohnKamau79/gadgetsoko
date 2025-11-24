<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductReview;
use App\Models\User;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'price',
        'image',
        'user_id',
    ]; 

    public function reviews() {
        return $this->hasMany(ProductReview::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
