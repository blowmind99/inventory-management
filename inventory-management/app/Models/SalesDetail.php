<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $table = 'sales_detail';

    protected $fillable = [
        'id',
        'sales_id',
        'inventori_id',
        'qty',
        'price'
    ];

    public function sales() {
        return $this->belongsTo(Sales::class, 'sales_id');
    }

    public function inventori() {
        return $this->belongsTo(Inventori::class, 'inventori_id');
    }
}
