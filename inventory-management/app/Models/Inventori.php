<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
    use HasFactory;

    protected $table = 'inventori';

    protected $fillable =[
        'id',
        'code',
        'name',
        'price',
        'stock',
        'created_at',
        'updated_at'
    ];
}
