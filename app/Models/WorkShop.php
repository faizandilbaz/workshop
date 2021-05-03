<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WorkShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading','link','description','start','end','time','paper_end_time','company_id'
    ];
    protected $dates = [
        'start',
        'end',
        'time',
        'paper_end_time'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }   
    public function workshopemployee(){
        return $this->hasMany(WorkshopEmployee::class);
    }
    public function results(){
        return $this->hasMany(Result::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function challenges(){
        return $this->hasMany(Challenge::class);
    }
   
}
