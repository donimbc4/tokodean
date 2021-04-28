<?php

namespace App\Models\MasterData\Banner;

use Illuminate\Database\Eloquent\Model;

class MBanner extends Model
{
    const ACTIVE = 1;
    protected $table = 'm_banner';
    protected $primaryKey = 'id';
    public $timestamps = false;
}