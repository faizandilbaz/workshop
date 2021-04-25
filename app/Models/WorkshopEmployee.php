<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopEmployee extends Model
{
    use HasFactory; 
    protected $fillable = [
        'company_id','status','workshop_id'
    ]; 
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }   
    public function workshop()
    {
        return $this->belongsTo(WorkShop::class,'workshop_id');
    }   
} 
