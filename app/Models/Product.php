<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'establishments_id',
        'product_inventories_id',
        'product_types_id',

        'user_created_at',
        'user_updated_at'
    ];
    public function inventary()
    {
        return $this->belongsTo(Product_inventory::class, 'products_id', 'product_inventories_id');
    }
    public function type()
    {
        return $this->hasMany(Product_type::class, 'id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');
    }
}
