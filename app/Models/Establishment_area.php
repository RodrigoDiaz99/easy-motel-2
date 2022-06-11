<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment_area extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'establishments_id',
        'user_created_at',
        'user_updated_at'
    ];

    // Relations
    public function establishment()
    {
        return $this->hasMany(establishment::class);
    }
}
