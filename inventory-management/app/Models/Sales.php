<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';

    protected $fillable =[
        'id',
        'number',
        'users_id',
        'date',
        'created_at',
        'updated_at'
    ];
}
