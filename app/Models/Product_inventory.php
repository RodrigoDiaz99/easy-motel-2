<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable =[
        'quantity',
        'purchase_price',
        'sales_price',
        'user_created_at',
        'user_updated_at'
    ];
    public function product()
    {
        return $this->hasMany(Product::class,'id');
    }
}
