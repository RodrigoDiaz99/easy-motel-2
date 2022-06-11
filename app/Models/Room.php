<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'establishments_id',
        'name',
        'room_types_id',
        'price',
        'room_sections_id',
        'room_capacity',
        'user_created_at',
        'user_updated_at'
    ];

    // Relations
    public function sections(){
        return $this->belongsToMany(Room_section::class);
    }
}
