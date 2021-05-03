<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory; 
    protected $fillable = [
        'status','work_shop_id','user_id','challenger_id','result','work_shop_employee_id'
    ]; 
    public function workshop()
    {
        return $this->belongsTo(WorkShop::class,'work_shop_id');
    }   
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }   
    public function challenger()
    {
        return $this->belongsTo(User::class,'challenger_id');
    }   
    public function workemployee()
    {
        return $this->belongsTo(WorkshopEmployee::class,'work_shop_employee_id');
    }   
}
