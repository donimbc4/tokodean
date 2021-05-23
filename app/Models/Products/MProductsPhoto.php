<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class MProductsPhoto extends Model
{
    const ACTIVE = 1;
    protected $table = 'm_product_photo';
    protected $primaryKey = 'id';
    public $timestamps = false;
}