<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title','description','deadline','points','company_id','status','dpoints','team_id','note','getpoints'
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
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function employeenotes(){
        return $this->hasMany(Employeenote::class);
    }
}
