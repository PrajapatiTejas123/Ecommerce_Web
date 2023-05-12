<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AddToCart extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'addtocarts';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'product_price'
    ];

    public function product(): BelongsTo
    {
       return $this->belongsTo(Product::class,'product_id','id');
    }
}
