<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddToCart extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'addtocarts';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];
}
