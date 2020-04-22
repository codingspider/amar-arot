<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_title', 'copyright', 'admin_email','seo_title','seo_description','seo_keywords','contact_address','contact_email','contact_phone','about','updated_by'];
}
