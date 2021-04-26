<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'type','statement','rightanswer','value','status','option_id','workshop_id'
    ];
    public function options(){
        return $this->hasMany(Option::class);
    }
    public function results(){
        return $this->hasMany(Result::class);
    }
}
