<?php

namespace App\Model;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function users()
    {
        return $this->belongsToMany('User');
    }

     public function status()
    {
    	return $this->belongsTo('App\Model\OrderStatus');
    }
}
