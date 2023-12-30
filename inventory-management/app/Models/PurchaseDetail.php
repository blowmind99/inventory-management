<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $table = 'purchase_detail';

    protected $fillable = [
        'id',
        'purchase_id',
        'inventori_id',
        'qty',
        'price',
        'created_at',
        'updated_at'
    ];

    public function purchase() {
        return $this->belongsTo(Purchase::class, 'inventori_id');
    }

    public function inventori() {
        return $this->belongsTo(Inventori::class, 'inventori_id');
    }
}
