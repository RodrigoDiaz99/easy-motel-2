<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Establishment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'capacity',
        'owner',
        'establishment_types_id',
        'description',
        'user_created_at',
        'user_updated_at'
    ];

    //Relations
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function Owner(){
        return $this->hasOne(User::class, 'id', 'owner');
    }

    public function rooms(){
        return $this->hasMany(Room::class, 'establishments_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'establishments_id', 'id');
    }
}
