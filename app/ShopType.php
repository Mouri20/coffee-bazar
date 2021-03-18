<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $table = 'shop_types';

    public function coffee()
    {
        return $this->hasMany('App\Coffee','shop_type_id');
    }
}
