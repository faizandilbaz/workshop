<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopEmployee extends Model
{
    use HasFactory; 
    protected $fillable = [
        'status','workshop_id','user_id','result'
    ]; 
    public function workshop()
    {
        return $this->belongsTo(WorkShop::class,'workshop_id');
    }   
    public function employee()
    {
        return $this->belongsTo(WorkShop::class,'user_id');
    }   
} 
