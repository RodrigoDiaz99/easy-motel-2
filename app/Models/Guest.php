<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'users_id',
        'name',
        'date_birt',
        'sex',
        'origin',
        'document_type',
        'document_path',
        'document_country',
        'email',
        'phone',
        'location',
        'zip',
        'observations',
        'user_created_at',
        'user_updated_at'
    ];
}
