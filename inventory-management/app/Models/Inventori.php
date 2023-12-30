<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalesDetail;
use App\Models\PurchaseDetail;

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
        'latest_stock',
        'created_at',
        'updated_at'
    ];
    public function salesDetails() {
        return $this->hasMany(SalesDetail::class, 'inventori_id');
    }

    public function purchaseDetails() {
        return $this->hasMany(PurchaseDetail::class, 'inventori_id');
    }
}
