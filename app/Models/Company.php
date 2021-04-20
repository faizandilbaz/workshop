<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Traits\UserFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, UserFunctions;

    protected $fillable = [
        'name','email', 'password','image','detail','status','api_token'
    ];
    
    public function setImageAttribute($value){
        if(is_string($value)){
            $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'images'); 
        }
        else if(is_file($value)){
            $this->attributes['image'] = ImageHelper::saveImage($value,'images'); 
        }
    }
}
