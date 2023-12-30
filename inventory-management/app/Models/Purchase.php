<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PurchaseDetail;

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

    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function purchaseDetails() {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id');
    }
}
