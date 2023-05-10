<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_name',
        'created_by'
    ];

    public function allProducts()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function activeProducts()
    {
        return $this->allProducts()->where('status',1);
    }
}
