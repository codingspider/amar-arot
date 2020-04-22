<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['address_line_1','user_id','type','status','district_id'];
}
