<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpressOrder extends Model
{
    protected $fillable=['status','user_id'];
}
