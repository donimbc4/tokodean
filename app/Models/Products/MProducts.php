<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class MProducts extends Model
{
    const ACTIVE = 1;
    protected $table = 'm_product';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categoryProduct()
    {
        return $this->hasOne('App\Models\CategoryProducts\MCategoryProducts', 'id', 'category_product_id');
	}
}