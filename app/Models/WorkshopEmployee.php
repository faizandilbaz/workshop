<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopEmployee extends Model
{
    use HasFactory; 
    protected $fillable = [
        'status','work_shop_id','user_id','result'
    ]; 
    public function workshop()
    {
        return $this->belongsTo(WorkShop::class,'work_shop_id');
    }   
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }   
    public function challenges(){
        return $this->hasMany(Challenge::class);
    }
} 
