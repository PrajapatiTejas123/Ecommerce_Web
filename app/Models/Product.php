<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'sku',
        'image',
        'price',
        'qty',
        'category_id',
        'discount',
        'color',
        'status',
    ];

    public function category(): BelongsTo
    {
         return $this->belongsTo(Category::class,'category_id','id');
    }

    public function addtocart()
     {
        return $this->hasMany(Product::class,'id','product_id');
     }
}
