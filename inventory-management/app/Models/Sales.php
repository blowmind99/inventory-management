<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SalesDetail;

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
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function salesDetails() {
        return $this->hasMany(SalesDetail::class, 'sales_id');
    }
}
