<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'type','statement','rightanswer','value','status','option_id','work_shop_id'
    ];
    public function options(){
        return $this->hasMany(Option::class);
    }
    public function results(){
        return $this->hasMany(Result::class);
    }
    public function workshop(){
        return $this->hasMany(WorkShop::class,'work_shop_id');
    }
}
