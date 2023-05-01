<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Productwishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'created_by',
        'updated_by',

    ];

    public static function countwishlist($product_id){
        $countwishlist = Productwishlist::where(['user_id' => Auth::user()->id,'product_id' => $product_id])->count();
        return $countwishlist;
    }

    public function product()
    {
         return $this->hasMany(Product::class,'product_id','id');
    }

    public function user()
    {
         return $this->hasOne(User::class,'user_id','id');
    }
}
