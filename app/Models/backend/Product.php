<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public static function getAllExcept($productId){
        return self::whereNotIn('id',[$productId])->get();
    }
}
