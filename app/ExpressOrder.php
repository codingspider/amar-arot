<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpressOrder extends Model
{
    protected $fillable=['status','read_status','user_status','user_id'];
}
