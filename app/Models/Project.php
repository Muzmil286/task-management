<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected $hidden = [
    //     'password',
    //     'ip_address',
    //     'admin_password',
    //     'admin_email',
    // ];
}
