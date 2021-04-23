<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table = "funds";
    protected $fillable = [
        'fund_name','fund_description','fund_type','venmo','paypal','full_name','phone_no','fb_url','insta_url','image','fund_status',
    ];
}
