<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name',
        'category_id',
        'created_by',
        'image'
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class,'category_id','id');
    }
}
