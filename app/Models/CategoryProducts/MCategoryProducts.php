<?php

namespace App\Models\CategoryProducts;

use Illuminate\Database\Eloquent\Model;

class MCategoryProducts extends Model
{
    const ACTIVE = 1;
    protected $table = 'm_category_products';
    protected $primaryKey = 'id';
    public $timestamps = false;
}