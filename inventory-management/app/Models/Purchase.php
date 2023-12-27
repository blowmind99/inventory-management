<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchase';

    protected $fillable =[
        'id',
        'number',
        'users_id',
        'date',
        'created_at',
        'updated_at'
    ];
}
