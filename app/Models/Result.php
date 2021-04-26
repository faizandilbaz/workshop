<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory; 
    protected $fillable = [
        'workshop_id','user_id','option','question_id'
    ]; 
    public function workshop()
    {
        return $this->belongsTo(WorkShop::class,'workshop_id');
    }   
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }   
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }   
}
