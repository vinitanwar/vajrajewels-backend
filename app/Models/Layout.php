<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Layout extends Model
{
    protected $fillable=[
        "number",
        "email",
        "address",
        "logo",
        "ty_link",
        "fb_link",
        "insta_link",
        "x_link",
        "linkdin_link",
        "thread_link",
        
    ];
}
