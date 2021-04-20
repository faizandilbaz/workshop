<?php

namespace App\Models;

use App\Traits\UserFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, UserFunctions;

    protected $fillable = [
        'name','email', 'password','image','detail','status','api_token'
    ];
}
