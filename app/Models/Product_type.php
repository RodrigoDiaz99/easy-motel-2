<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_created_at',
        'user_updated_at'
    ];
    public function product(){
        return $this->belongsTo(Product_inventory::class,'products_id','product_types_id');
    }

}
