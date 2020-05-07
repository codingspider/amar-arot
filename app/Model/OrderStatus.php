<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public function account()
    {
            return $this->hasOne('App\Model\Order');
    }
}
