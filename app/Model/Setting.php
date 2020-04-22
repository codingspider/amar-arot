<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['image','site_title', 'copyright', 'admin_email','seo_title','description','seo_keywords','contact_address','contact_email','contact_phone','about','updated_by'];
}
