<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title','description','deadline','points','company_id','status','dpoints','team_id'
    ];
    protected $dates = [
        'deadline'
    ];
    public function companies()
    {
        return $this->belongsTo(Company::class,'company_id');
    }   

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }   
    public static function pending()
    {
        return (New static)::where('status','Pending')->get();
    }  
}
